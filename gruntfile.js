module.exports = function(grunt) {
 
   // Project configuration.
   grunt.initConfig({
     pkg: grunt.file.readJSON('package.json'),
    // Tasks
	
	cssmin:{
		quote_form_css: {
			files: [{
				expand: true,
				cwd: 'wp-content/plugins/removals-index-quote-form/css/',
				src: ['*.css','!*.min.css'],
				dest: 'wp-content/plugins/removals-index-quote-form/css/',
				ext: '.min.css'
			}]
		}
	}
	
   });
 
   // Load the plugin that provides the "uglify" task.
   grunt.loadNpmTasks('grunt-contrib-cssmin');
 
   // Default task(s).
    grunt.registerTask('quote_form_css', ['cssmin:quote_form_css']);
  // grunt.registerTask('default', ['']);
 
};