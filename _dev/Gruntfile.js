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