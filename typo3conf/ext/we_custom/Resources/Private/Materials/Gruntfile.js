'use strict';

module.exports = function (grunt) {

	grunt.file.defaultEncoding = 'utf-8';

	// Project configuration.
	grunt.initConfig({
		dirs: {
			bower: 'bower_components',
			js: {
				src: 'Resources/Public/Javascript/Compiled',
				dest: '../../Public/JavaScript'
			},
			sass: {
				src: 'Styles',
				dest: '../../Public/Css'
			}
		},
		compass: {
			dist: {
				options: {
					config: 'config.rb'
				}
			}
		},
		concat: {
			dist: {
				src: [
					'<%= dirs.bower %>/jquery/dist/jquery.min.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/affix.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/alert.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/button.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/carousel.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/collapse.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/dropdown.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/tab.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/transition.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/scrollspy.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/modal.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/tooltip.js',
					'<%= dirs.bower %>/bootstrap-sass-twbs/vendor/assets/javascripts/bootstrap/popover.js'
				],
				dest: '<%= dirs.js.dest %>/libs.min.js'
			}
		},
		watch: {
			sass: {
				files: ['<%= dirs.sass.src %>/**/*.scss'],
				tasks: 'compass'
			}
		}
	});

	// Load the plugin that provides the "watch" task.
	grunt.loadNpmTasks('grunt-contrib-concat');

	grunt.loadNpmTasks('grunt-contrib-watch');

	// Load the plugin that provides the "compass" task.
	grunt.loadNpmTasks('grunt-contrib-compass');

	// Default task.
	grunt.registerTask('default', ['build', 'watch']);

	// Build task.
	grunt.registerTask('build', ['compass', 'concat']);
}
