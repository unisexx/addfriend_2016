<?php
if($this->uri->segment(1) == "aboutus"){
	$title_page = lang("about");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("about")."</li></ul>";
}

if($this->uri->segment(1) == "services"){
	$title_page = lang("service");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("service")."</li></ul>";
}

if($this->uri->segment(1) == "talks" && $this->uri->segment(2) == "" && $this->uri->segment(3) == ""){
	$title_page = lang("Talk_to_Dentists");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("Talk_to_Dentists")."</li></ul>";
}

if($this->uri->segment(1) == "talks" && $this->uri->segment(2) == "category" && is_numeric($this->uri->segment(3))){
	$title_page = lang("Talk_to_Dentists");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li><a href='talks'>".lang("Talk_to_Dentists")."</a></li><li class='active'>".category_name($this->uri->segment(3))."</li></ul>";
}

if($this->uri->segment(1) == "talks" && $this->uri->segment(2) == "view" && is_numeric($this->uri->segment(3))){
	$title_page = lang("Talk_to_Dentists");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li><a href='talks'>".lang("Talk_to_Dentists")."</a></li>".category_name_by_talking_view($this->uri->segment(3))."</ul>";
}

if($this->uri->segment(1) == "dentists" && $this->uri->segment(2) == "" && $this->uri->segment(3) == ""){
	$title_page = lang("Our_Dentists");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("Our_Dentists")."</li></ul>";
}

if($this->uri->segment(1) == "dentists" && $this->uri->segment(2) == "view" && is_numeric($this->uri->segment(3))){
	$title_page = lang("Our_Dentists");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li><a href='dentists'>".lang("Our_Dentists")."</a></li>".dentist_name($this->uri->segment(3))."</ul>";
}

if($this->uri->segment(1) == "staffs"){
	$title_page = lang("Our_Staffs");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("Our_Staffs")."</li></ul>";
}

if($this->uri->segment(1) == "patients" && $this->uri->segment(2) == "" && $this->uri->segment(3) == ""){
	$title_page = lang("TESTIMONIAL");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("TESTIMONIAL")."</li></ul>";
}

if($this->uri->segment(1) == "patients" && $this->uri->segment(2) == "view" && is_numeric($this->uri->segment(3))){
	$title_page = lang("TESTIMONIAL");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li><a href='patients'>".lang("TESTIMONIAL")."</a></li>".patient_name($this->uri->segment(3))."</ul>";
}

if($this->uri->segment(1) == "contacts"){
	$title_page = lang("CONTACT_US");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("CONTACT_US")."</li></ul>";
}

if($this->uri->segment(1) == "galleries" && $this->uri->segment(2) == "" && $this->uri->segment(3) == ""){
	$title_page = lang("gallery");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("gallery")."</li></ul>";
}

if($this->uri->segment(1) == "galleries" && $this->uri->segment(2) == "view" && is_numeric($this->uri->segment(3))){
	$title_page =  lang("gallery");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li><a href='galleries'>".lang("gallery")."</a></li>".gallery_name($this->uri->segment(3))."</ul>";
}

if($this->uri->segment(1) == "tools" && $this->uri->segment(2) == "view" && is_numeric($this->uri->segment(3))){
	$title_page =  lang("tools");
	$breadcrumb = "<li><a href='home'>".lang("home")."</a></li><li class='active'>".lang("tools")."</li></ul>";
}
?>

<div class="section" id="path-page">
  <div class="container">
    <div class="line-hilight">&nbsp;</div>
    <div class="row">
      <div class="col-md-3">
        <span class="title-page"><?=$title_page?></span>
      </div>
      <div class="col-md-9">
        <ul class="breadcrumb">
          <?=$breadcrumb?>
        </ul>
      </div>
    </div>
  </div>
</div>