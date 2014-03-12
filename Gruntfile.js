'use strict';
module.exports = function(grunt) {
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
    grunt.initConfig({
        watch: {
            livereload: {
                options: { livereload: true },
                files: [
												'templates/*.tpl',
												'*.php',
												'*/*.php',
												'img/*.php',
												'img/*/*.*',
												'templates/mail/*.tpl',
												'css/*.css'
												]
            }
        },
    });
    grunt.registerTask('default', ['watch']);
};
