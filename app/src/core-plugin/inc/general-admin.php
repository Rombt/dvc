<?php

/**
 * This is the place for functions that will be used frequently in the admin part of your site.
 */












//===============================================================================================
//===============================================================================================


function get_files_list( $path ) {

	if ( ! is_dir( $path ) ) {
		mkdir( $path, 0777, false );
	}

	$files = scandir( $path ); // Получаем список файлов в директории
	$file_options = array();

	foreach ( $files as $file ) {
		if ( $file !== '.' && $file !== '..' ) {
			$file_options[] = $file; // Создаем массив для использования в метабоксе
		}
	}

	return $file_options;
}


/*
	$mod 'w'	Открывает файл для записи; помещает указатель в начало файла и обрезает файл до нулевой длины. Если файл не существует - пытается его создать.
*/

function log_in_file( $data, $mod = 'a' ) {

	$path = plugin_dir_path( __FILE__ ) . 'log.txt';
	$file_handle = fopen( $path, $mod );

	if ( $file_handle ) {
		$timestamp = date( 'd-m-y H:i:s' );

		$log_entry = $timestamp . ': ' . json_encode( $data ) . PHP_EOL;

		fwrite( $file_handle, $log_entry );
		fclose( $file_handle );
	} else {
		echo 'Ошибка при открытии файла для записи';
	}
}