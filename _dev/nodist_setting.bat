::"cmd /k"は、コマンドプロンプトを閉じないため、"cd %~p0"は、バッチファイルを実行した箇所のパスへ移動する
cd %~p0
cmd /k nodist 5.4.1