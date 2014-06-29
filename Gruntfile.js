//Gruntfile
module.exports = function (grunt) {

    //Initializing the configuration object
    grunt.initConfig({

        // Task configuration
        copy: {
            boostrap_fonts: {
                expand: true,
                cwd: 'bower_components/bootstrap/fonts/',
                src: '**',
                dest: 'public/assets/fonts/',
                flatten: true,
                filter: 'isFile'
            },
            jquery: {
                expand: true,
                cwd: 'bower_components/jquery/dist/',
                src: '**',
                dest: 'public/assets/javascript/jquery/',
                flatten: true,
                filter: 'isFile'
            },
            bootstrap_js: {
                expand: true,
                cwd: 'bower_components/bootstrap/dist/js/',
                src: '**',
                dest: 'public/assets/javascript/bootstrap/',
                flatten: true,
                filter: 'isFile'
            }
        },
        concat: {
            options: {
                separator: ';'
            },
            js_frontend: {
                src: [
                    './bower_components/jquery/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/frontend.js'
                ],
                dest: './public/assets/javascript/frontend.js'
            },
            js_backend: {
                src: [
                    './bower_components/jquery/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/backend.js'
                ],
                dest: './public/assets/javascript/backend.js'
            }
        },
        less: {
            development: {
                options: {
                    compress: true  //minifying the result
                },
                files: {
                    "./public/assets/stylesheets/frontend.css": "./app/assets/stylesheets/frontend.less",
                    "./public/assets/stylesheets/backend.css": "./app/assets/stylesheets/backend.less"
                }
            }
        },
        uglify: {
            options: {
                mangle: false // Use if you want the names of your functions and variables unchanged
            },
            frontend: {
                files: {
                    './public/assets/javascript/frontend.js': './public/assets/javascript/frontend.js'
                }
            },
            backend: {
                files: {
                    './public/assets/javascript/backend.js': './public/assets/javascript/backend.js'
                }
            }
        },
        phpunit: {
            classes: {
                dir: 'app/tests/' //location of the tests
            },
            options: {
                bin: 'vendor/bin/phpunit',
                colors: true
            }
        },
        watch: {
            js_frontend: {
                files: [
                    //watched files
                    './bower_components/jquery/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/frontend.js'
                ],
                tasks: ['concat:js_frontend', 'uglify:frontend'],
                options: {
                    livereload: true
                }
            },
            js_backend: {
                files: [
                    //watched files
                    './bower_components/jquery/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/backend.js'
                ],
                tasks: ['concat:js_backend', 'uglify:backend'],
                options: {
                    livereload: true
                }
            },
            less: {
                files: ['./app/assets/stylesheets/*.less'],
                tasks: ['less'],
                options: {
                    livereload: true
                }
            },
            tests: {
                files: ['app/controllers/*.php', 'app/models/*.php'],  //the task will run only when you save files in this location
                tasks: ['phpunit']
            }
        }
    });

    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-phpunit');
    grunt.loadNpmTasks('grunt-contrib-copy');

    // Task definition
    grunt.registerTask('init', ['copy', 'less', 'concat', 'uglify']);
    grunt.registerTask('default', ['watch']);

};