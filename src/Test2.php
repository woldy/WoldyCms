<?php
	namespace Woldy\Cms;

class Test2{
	public static function test2(){
		echo "test2\n";

		return view('Test::test', compact('javascript'));
	}

} 