<?php 

if(!function_exists('cycle'))
{
	function cycle()
	{
		static $i;	
		
		if (func_num_args() == 0)
		{
			$args = array('even','odd');
		}
		else
		{
			$args = func_get_args();
		}
		return 'class="'.$args[($i++ % count($args))].'"';
	}
}

if(!function_exists('menu_active'))
{
    function menu_active($module,$controller = FALSE,$method = FALSE,$class='active')
    {
        $CI =& get_instance();
        if($controller)
        {
            return ($CI->router->fetch_module() == $module && $CI->router->fetch_class() == $controller) ? 'class="'.$class.'"' : '';    
        }
        elseif($method){
            return ($CI->router->fetch_module() == $module && $CI->router->fetch_method() == $method) ? 'class="'.$class.'"' : '';  
        }
        else
        {
            return ($CI->router->fetch_module() == $module) ? 'class='.$class : ''; 
        }
    }
}

if(!function_exists('menu_active2'))
{
    function menu_active2($module,$controller = FALSE,$class='active')
    {
        $CI =& get_instance();
        if($controller)
        {
            return ($CI->router->fetch_module() == $module && $CI->router->fetch_class() == $controller) ? 'class='.$class : '';    
        }
        else
        {
            return ($CI->router->fetch_module() == $module) ? 'class='.$class : ''; 
        }
    }
}

if(!function_exists('page_active'))
{
	function page_active($page,$uri=4,$class='active')
	{
		$CI =& get_instance();
		return ($CI->uri->segment($uri)==$page) ? 'class='.$class : '';
	}
}

if(!function_exists('option_publish'))
{
	function option_publish()
	{
		return array('on' => 'ON', 'off' => 'OFF');
	}
}

if(!function_exists('get_option'))
{
	function get_option($value,$text,$table,$condition = NULL,$lang = NULL)
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from $table $condition");
		foreach($query->result() as $item) $option[$item->{$value}] = lang_decode($item->{$text},$lang);
		return $option;
	}
}

if(!function_exists('fix_file'))
{
    function fix_file(&$files)
    {
        $names = array( 'name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);
    
        foreach ($files as $key => $part) {
            // only deal with valid keys and multiple files
            $key = (string) $key;
            if (isset($names[$key]) && is_array($part)) {
                foreach ($part as $position => $value) {
                    $files[$position][$key] = $value;
                }
                // remove old key reference
                unset($files[$key]);
            }
        }
    }
}

if(!function_exists('avatar'))
{
    function avatar($img=FALSE,$size = NULL)
    {
        return ($img)?'uploads/users/'.$size.$img:'media/images/noavatar.gif';
    }
}


function avatar($userid){
    $CI =& get_instance();
    $user = new User($userid);
    if($user->image == ""){
        return "media/images/noavatar.gif";
    }else{
        return $user->image;
    }
}

if(!function_exists('thumb'))
{
    function thumb($imgUrl,$width,$height,$zoom_and_crop,$param = NULL){
    	if(strpos($imgUrl, "http://") !== false or strpos($imgUrl, "https://") !== false){
    		return "<img ".$param." src=".site_url("media/timthumb/timthumb.php?src=".$imgUrl."&zc=".$zoom_and_crop."&w=".$width."&h=".$height)." width=".$width." height=".$height.">";
    	}else{
    		return "<img ".$param." src=".site_url("media/timthumb/timthumb.php?src=".site_url($imgUrl)."&zc=".$zoom_and_crop."&w=".$width."&h=".$height)."  width=".$width." height=".$height.">";
    	}
        
    }
}

function webboard_group($post,$type){
    $CI =& get_instance();
    $webboard_post_level = new Webboard_post_level();
    $webboard_post_level->where('post <',$post)->order_by('post','desc')->limit(1)->get();
    if($webboard_post_level->exists())
    {
        if($type == "name")
        {
            return $webboard_post_level->name;
        }
        else
        {
            return $webboard_post_level->image;
        }
    }
    else
    {
        $webboard_post_level->get_by_name('Starter');
        if($type == "name")
        {
            return $webboard_post_level->name;
        }
        else
        {
            return $webboard_post_level->image;
        }
    }
    
}

function stripUploadString($uploadString){
	$fileName = explode("/", $uploadString);
	$last_key = key(array_slice($fileName, -1, 1, TRUE));
	return $fileName[$last_key];
}

function youtube($youtubeurl){
    //parse_str( parse_url( $youtubeurl, PHP_URL_QUERY ), $my_array_of_vars );
    //preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=embed/)[^&\n]+|(?<=v=)[^&\‌​n]+|(?<=youtu.be/)[^&\n]+#", $youtubeurl, $matches);
    
    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
  	preg_match($pattern, $youtubeurl, $matches);
  	return isset($matches[1]) ? '<iframe width="640" height="390" src="http://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowfullscreen></iframe>' : false;
	
	//return '<iframe width="560" height="315" src="http://www.youtube.com/embed/'.$matches[0].'" frameborder="0" allowfullscreen></iframe>';
}

function remove_dir($dir) 
{ 
    if(is_dir($dir)) 
    { 
        $dir = (substr($dir, -1) != "/")? $dir."/":$dir; $openDir = opendir($dir); 
        while($file = readdir($openDir)) 
        { 
            if(!in_array($file, array(".", ".."))) 
            { 
                if(!is_dir($dir.$file)) 
                { 
                    @unlink($dir.$file); 
                } 
                else 
                { 
                remove_dir($dir.$file); 
                } 
            } 
        } 
        closedir($openDir); @rmdir($dir); 
    } 
} 


function dbConvert(&$value,$key = null,$output='UTF-8')
{
	$encode = array('UTF-8'=>'TIS-620','TIS-620'=>'UTF-8');
	if(is_array($value)||is_object($value))
	{
		$value = array_change_key_case($value);
		array_walk($value,'dbConvert',$output);
	}
	else
	{
		@$value = iconv($encode[$output],$output,$value);
	}
}

function cleanformat($value)
{
    $clean = intval(str_replace(',', '', $value));
    return $clean;
}

function category_name($id){
    $CI =& get_instance();
    $rs = new Category($id);
    return lang_decode($rs->name);
}

function category_name_by_talking_view($id){
    $CI =& get_instance();
    $rs = new Talk($id);
    return "<li><a href='talks/category/".$rs->category->id."'>".lang_decode($rs->category->name)."</a></li><li class='active'>".lang_decode($rs->title)."</li>";
}

function dentist_name($id){
    $CI =& get_instance();
    $rs = new Dentist($id);
    return "<li class='active'>".lang_decode($rs->name)."</li>";
}

function patient_name($id){
    $CI =& get_instance();
    $rs = new Patient($id);
    return "<li class='active'>".lang_decode($rs->name)."</li>";
}

function gallery_name($id){
    $CI =& get_instance();
    $rs = new Category($id);
    return "<li class='active'>".lang_decode($rs->name)."</li>";
}
?>