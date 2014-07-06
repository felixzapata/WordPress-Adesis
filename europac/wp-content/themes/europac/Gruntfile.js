module.exports = function(grunt) {
    'use strict';
    // show elapsed time at the end
    require('time-grunt')(grunt);
    // load all grunt tasks
    require('load-grunt-tasks')(grunt);

    var yeomanConfig = {
        app: '.',
        dist: 'dist',
        tmp: '.tmp'
    };

    grunt.initConfig({
        yeoman: yeomanConfig,
        uglify: {
            dist: {
                files: {
                    'js/dist/common.js': [
                        'js/jquery-1.8.1.min.js',
                        'js/jquery-ui.min.js',
                        'js/jquery.fancybox.pack.js',
                        'js/jquery.jcarousel.min.js',
                        'js/mustache.js',
                        'js/ui.selectmenu.js',
                        'js/jScrollPane.js',
                        'js/utils.js'
                    ]
                }
            }
        },

        watch: {
            compass: {
                files: ['<%= yeoman.app %>/scss/{,*/}*.{scss,sass}'],
                tasks: ['compass:server']
            },
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
        compass: {
            options: {
                sassDir: '<%= yeoman.app %>/css/sass',
                cssDir: '<%= yeoman.app %>/css',
                imagesDir: '<%= yeoman.app %>/img',
                fontsDir: '<%= yeoman.app %>/css/fonts',
                httpImagesPath: '<%= yeoman.app %>/img',
                httpFontsPath: '<%= yeoman.app %>/css/fonts',
                relativeAssets: false,
                force: true,
                outputStyle: 'compressed',
                noLineComments: true
            },
            server: {
                options: {
                    debugInfo: false,
                    force: true,
                    outputStyle: 'compressed',
                    noLineComments: true
                }
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
                        'css/generico.css',
                        'css/home.css'
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
                        pattern: /\(..\/img\//ig,
                        replacement: '(../../img/'
                    }, {
                        pattern: /\(fonts\//ig,
                        replacement: '(../fonts/'
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
        'compass:server',
        'uglify',
        'cssmin',
        'string-replace'
    ]);
    grunt.registerTask('dev', [
        'clean',
        'compass:server',
        'uglify',
        'cssmin',
        'string-replace',
        'watch'
    ]);

};
