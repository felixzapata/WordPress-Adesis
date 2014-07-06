module.exports = function(grunt) {
    'use strict';
    // show elapsed time at the end
    require('time-grunt')(grunt);
    // load all grunt tasks
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        uglify: {
            dist: {
                files: {
                    'js/dist/common.js': []
                }
            }
        },

        watch: {
            js: {
                files: [
                    '!Gruntfile.js',
                    '!js/dist/*.js',
                    'js/*.js'
                ],
                tasks: ['uglify']
            },
            css: {
                files: [
                    'css/**/*.css',
                    'style.css',
                    '!css/dist/*.css'
                ],
                tasks: ['cssmin', 'string-replace']
            }
        },
        imagemin: {
            dist: {
                files: [{
                    expand: true,
                    cwd: 'img',
                    src: '{,**/}*.{png,jpg,jpeg,gif}',
                    dest: 'img'
                }]
            }
        },
        cssmin: {
            combine: {
                files: {
                    'css/dist/styles.css': [
                        'style.css',
                        'css/ie.css'
                    ]
                }
            },
            minify: {
                expand: true,
                cwd: 'css/',
                src: ['*.css'],
                dest: 'css/dist/'
            }
        },
        'string-replace': {
            dist: {
                files: {
                    'css/dist/styles.css': 'css/dist/styles.css'
                },
                options: {
                    replacements: [{
                        pattern: /\(img\//ig,
                        replacement: '(../../img/'
                    }, {
                        pattern: /\(fonts\//ig,
                        replacement: '(../../fonts/'
                    }]
                }
            }
        },
        clean: {
            dist: [
                'js/dist/*',
                'css/dist/*'
            ]
        }
    });


    // Register tasks
    grunt.registerTask('default', [
        'clean',
        'uglify',
        'cssmin',
        'string-replace'
    ]);
    grunt.registerTask('dev', [
        'clean',
        'uglify',
        'cssmin',
        'string-replace',
        'watch'
    ]);

};
