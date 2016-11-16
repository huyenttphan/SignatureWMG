module.exports = function(grunt) {

	var pkg = grunt.file.readJSON('package.json');

	//-----------------------------------------------------
	//各パッケージの設定
	//-----------------------------------------------------
	grunt.initConfig({

		//SassをとCompassをコンパイルするパッケージ
		compass: {
			dist: {
				options:{
					config:'_compass/config.rb',
					bundleExec:true
				}
			}
		},
		//指定したファイルを上書き保存と同時に登録タスクを実行するパッケージ
		watch: {
			sass:{
				files:['_sass/**/*.scss'],
				tasks:['compass','cmq','cssmin'],
				options:{
					nospawn:true
				}
			},
			html: {
				files: [
                    '_template/**/*.hbs',
                    '_template/**/*.json',
                    '_template/_z_docs/**/**/*.md'
                    ],
				tasks: ['newer:assemble', 'prettify:dist'],
			}
		},
		//バラバラに記述されたメディアクエリをまとめるパッケージ
		cmq:{
			options:{
				log:false
			},
			dynamic:{
				expand:true,
				cwd:'../common/css/',
				src:['**/*.css'],
				dest:'../common/css/'
			}

		},
		//csscombでcssプロパティを揃えるパッケージ
		csscomb:{
			dev:{
				expand:true,
				cwd:'../common/css/',
				src:['**/*.css'],
				dest:'../common/css/'
			}
		},
		//CSSをminifyするパッケージ
		cssmin: {
			minify: {
				expand: true,
				cwd: '../common/css/',
				src: ['**/*.css', '!**/*.min.css'],
				dest: '../common/css/',
				ext: '.min.css'
			}
		},
		distHtmlPath: '../',
		// assembleの設定
		assemble: {
			options: {
				layoutdir: '_template/_base-layout',
			},
			dev: {
				options: {
					layout: 'default.hbs',
					partials: '_template/_component/*.hbs',
					data: [
                        '_template/_component/*.json',
                        '_template/_page-layout/*.json'
                    ],
					flatten: false,
					expand: true,
				},
				files: [
					{
						expand: true,
						cwd: '_template/_page-layout/',
						src: '**/*.hbs',
						dest: '<%= distHtmlPath %>'
					}
				]
			},
			docs: {
				options: {
					layout: 'docs-layout.hbs',
					partials: '_template/_z_docs/md/*.md',
					flatten: true,
					helpers: 'handlebars-helper-md'
				},
				src: '_template/_z_docs/*.hbs',
				dest: '<%= distHtmlPath %>/docs/'
			}
		},
		// prettifyの設定
		prettify: {
      options: {
        indent: 2,
        indent_char: ' ',
        brace_style: 'expand',
        unformatted: ['a', 'code', 'pre']
      },
      dist: {
        expand: true,
        cwd: '<%= distHtmlPath %>',
        ext: '.html',
        src: ['*.html'],
        dest: '<%= distHtmlPath %>'
      }
		},
		// browserSyncの設定

		browserSync: {
			dev: {
				bsFiles: {
					src : ['../']
				},
				options: {
					watchTask: true,
					watchOptions: {
						ignoreInitial: true
					},
					server: '../',
					startPath: 'docs/',
					notify: {
					  styles: ['display: none','background-color: #1B2032']
					}
				}
			}
		}
	});

	//-----------------------------------------------------
	// loadNpmTasksを変更(自動的にpackage.jsonからタスク登録)
	//-----------------------------------------------------
	var taskName;
	for(taskName in pkg.devDependencies) {
		if(taskName.substring(0, 6) == 'grunt-') {
			grunt.loadNpmTasks(taskName);
		}
	}

	//-----------------------------------------------------
	//grunt実行タスク（gruntコマンドで起動）
	//-----------------------------------------------------
	grunt.registerTask('dev', ['assemble','browserSync','watch']);
	grunt.registerTask('default', ['watch:sass']);

	//-----------------------------------------------------
	//grunt実行タスクのエラーログ
	//-----------------------------------------------------
	grunt.registerTask('eatwarnings', function() {
			grunt.warn = grunt.fail.warn = function(warning) {
					grunt.log.error(warning);
			};
	});

};
