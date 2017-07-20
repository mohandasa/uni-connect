
angular.module('myapp', [])
	.controller('BlogsController', function($scope, $http) {
		$scope.predicate = "creation_time";			// Default sort field
		$scope.reverse = true;						// Default sort order - descending

		$scope.thisUser = undefined;
		$scope.initUser = function(user) {
			/**
			 *	Initialized the user details when controller is initialized
			 */

			$scope.thisUser = user;

			// create the filter functions required to filter out the blogs
			$scope.filterByZone = function(blog) { return blog.user.zone === user.zone };
			$scope.filterByRegion = function(blog) { return blog.user.region === user.region };
			$scope.filterByBranch = function(blog) { return blog.user.branch === user.branch };
			$scope.selectedFilter = 'all';		// By default no filter is applied
		}

		$scope.blogs = [];
		$scope.submitBlog = function() {
			if ($scope.blogContent === undefined
				|| $scope.blogContent.length === 0) {
				// No content submitted. Alert the uer.
				alert('Please enter some content to Post');
			} else {
				var btn = $('#timelinePostButton').button('loading');		// Instruct button to show the loading text

				// create the blog entry to be stored into ES
				var newBlog = {
					content: $scope.blogContent,
					user: $scope.thisUser,
					verified : 1,
					type: 'open',
					creation_time: new Date().toISOString()
				}

				// create the request to store the new blog entry into ES
				var req = {
					method: 'POST',
					url: 'http://localhost:9200/blogs/content/',
					headers: {
						'Content-Type': 'application/json'
					},
					data: newBlog
				}
				// make the request
				$http(req)
					.success(function(data) {
						// addition was a success - add the new blog to existing list
						newBlog.id = data['_id'];
						$scope.blogs.push(newBlog);
						$scope.blogContent = "";
						btn.button('reset');
					})
					.error(function(data) {
						// insert failed
						console.error(JSON.stringify(data));
					});
			}
		}

		$scope.submitComment = function(blog) {
			if (blog.newComment === undefined
				|| blog.newComment.length === 0) {
				// No content submitted. Alert the uer.
				alert('Please enter some comments');
			} else {
				var btn = $('#timeline-addCommentBtn').button('loading');		// Instruct button to show the loading text

				// create the blog entry to be stored into ES
				var newComment = {
					comment: blog.newComment,
					user: $scope.thisUser,
					verified : 1,
					creation_time: new Date().toISOString(),
					blogId: blog.id
				}

				// create the request to store the new blog entry into ES
				var req = {
					method: 'POST',
					url: 'http://localhost:9200/blogs/comment/',
					headers: {
						'Content-Type': 'application/json'
					},
					data: newComment
				}
				// make the request
				$http(req)
					.success(function(data) {
						// addition was a success - add the new blog to existing list
						if (blog.comments === undefined) { blog.comments = []; }
						newComment.id = data['_id'];
						blog.comments.push(newComment);
						blog.newComment = undefined;
						btn.button('reset');
					})
					.error(function(data) {
						// insert failed
						console.error(JSON.stringify(data));
					});
			}
		}

		$scope.like = function(type, typeData) {
			var reqData = {
				"script": "if (ctx._source.containsKey(\"likes\")) { if (ctx._source.likes.contains(user)) { ctx.op = \"none\" } else {ctx._source.likes+= user;}} else {ctx._source.likes= [user]}",
				// "script": "if (ctx._source.containsKey(\"likes\")) {ctx._source.like+= user;} else {ctx._source.likes= [user]}",
				"params": {
					"user": $scope.thisUser.id
				}
			}

			var req = {
				method: 'POST',
				url: 'http://localhost:9200/blogs/' + type + '/' + typeData.id + '/_update',
				headers: {
					'Content-Type': 'application/json'
				},
				data: reqData
			}
			// make the request
			$http(req)
				.success(function(data) {
					if (!_.contains(typeData.likes, $scope.thisUser.id)) {
						if (typeData.likes === undefined) typeData.likes = [];
						typeData.likes.push($scope.thisUser.id);
					}
				})
				.error(function(data) {
					// insert failed
					console.error(JSON.stringify(data));
				});
		}

		/**
		 *	On page-load pull top-10 recent blogs
		 */
		var getAllComments = function(blogIndex, blogId) {
			var req = {
				method: 'POST',
				url: 'http://localhost:9200/blogs/comment/_search?q=blogId:' + blogId,
				headers: {
					'Content-Type': 'application/json'
				},
				data: {
					"sort": [
						{ "creation_time": { "order": "desc" } }
					],
					"size": 5
				}
			}
			$http(req)
				.success(function(data) {
					$scope.blogs[blogIndex].comments = [];
					_.each(data.hits.hits, function(hit) {
						var thisComment = hit['_source'];
						thisComment.id = hit['_id'];
						$scope.blogs[blogIndex].comments.push(thisComment);
					});
				})
				.error(function(data) {
					console.error(JSON.stringify(data));
				});
		}

		var getAllBlogs = function() {
			var req = {
				method: 'POST',
				url: 'http://localhost:9200/blogs/content/_search',
				headers: {
					'Content-Type': 'application/json'
				},
				data: {
					"sort": [
						{ "creation_time": { "order": "desc" } }
					]
				}
			}
			$http(req)
				.success(function(data) {
					_.each(data.hits.hits, function(hit) {
						var thisBlog = hit['_source'];
						thisBlog.id = hit['_id'];
						$scope.blogs.push(thisBlog);
						getAllComments($scope.blogs.length - 1, thisBlog.id);
					});
				})
				.error(function(data) {
					console.error(JSON.stringify(data));
				});
		}

		getAllBlogs();

});


/*{
	id: '1',
	content: 'Its a bright shiny day!',
	user: {
		id   : 1,
		name : 'Reena',
		branch: 'Malad',
		region: 'Churchgate',
		zone: 'North'
	},
	verified : 1,
	type: 'open',
	creation_time: new Date().toISOString(),
	comments: [
		{ user: { id: 'Abby'}, comment: 'Yabba Dabba Dooo', likes: 2, creation_time: new Date().toISOString()},
		{ user: { id: 'Tejas'}, comment: 'So??!', likes: 100, creation_time: new Date().toISOString()}
	]
}*/