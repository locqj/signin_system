<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Redirect;

class UploadImageController extends Controller
{	
	/**
	 * [uploadIndexImg 上传轮播]
	 * @return [type] [description]
	 */
    public function upload(Request $request)
    {	

    	if ($request->isMethod('POST')) {
	    	$file = $request->file('source');
	    	// return $file;
	    	if ($file->isValid()) {
	    		$originalName = $file->getClientOriginalName(); //原文件名
	    		$ext = $file->getClientOriginalExtension(); //扩展名
	    		$type = $file->getClientMimeType(); //MimeType
	    		$realPath = $file->getRealPath(); //临时绝对路径

	    		$filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;

	    		$bool = Storage::disk('indeximg')->put($filename, file_get_contents($realPath));

	    		$data = imagelog()->add($filename, $request->get('status_log'));
	    		if ($data['code'] == 201) {
	    			return Redirect::to('index/upload');
	    		}
	    	}
    	}
    	$count = imagelog()->get_count();
    	$index = imagelog()->list_index();
    	$action = imagelog()->list_action();
		return view('index.list_upload_index', compact('count', 'index', 'action'));
    	
    }

    public function del()
    {
    	return imagelog()->del();
    }


}
