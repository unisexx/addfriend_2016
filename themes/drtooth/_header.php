<?=modules::run('addresses/inc_header'); ?>

<div class="navbar navbar-default navbar-static-top" id="bg-header">
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="brand">&nbsp;</div>
    </div>
    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <div id="cssmenu">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="home" <?if($this->uri->segment(1) == "home"){echo"class='active'";}?>><?=lang("home")?></a>
                </li>
                <li>
                    <a href="aboutus" <?if($this->uri->segment(1) == "aboutus"){echo"class='active'";}?>><?=lang("about")?></a>
                </li>
                <li>
                    <a href="#" <?if($this->uri->segment(1) == "services"){echo"class='active'";}?>><?=lang("service")?></a>
                    <ul>
                        <li>
                            <a href="services"><?=lang("allservice")?></a>
                        </li>
                        <li>
                            <a href="talks/category/4"><?=lang("Aesthetic_Dentistry")?></a>
                        </li>
                        <li>
                            <a href="talks/category/3"><?=lang("Dental_Diagnosis")?></a>
                        </li>
                        <li>
                            <a href="talks/category/49"><?=lang("Orthodontic_Dentistry");?></a>
                        </li>
                        <li>
                            <a href="talks/category/5"><?=lang("Oral_and_Maxillofacial_Surgery")?></a>
                        </li>
                        <li>
                            <a href="talks/category/50"><?=lang("Prosthodontic_Dentistry")?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" <?if($this->uri->segment(1) == "dentists" || $this->uri->segment(1) == "talks"){echo"class='active'";}?>><?=lang("MEET_THE_DENTISTS")?></a>
                    <ul>
                        <li>
                            <a href="dentists"><?=lang("Our_Dentists")?></a>
                        </li>
                        <li>
                            <a href="talks"><?=lang("Talk_to_Dentists")?></a>
                        </li>
                        <li>
                            <a href="staffs"><?=lang("Our_Staffs")?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="patients" <?if($this->uri->segment(1) == "patients"){echo"class='active'";}?>><?=lang("TESTIMONIAL")?></a>
                    <!-- <ul>
                        <li>
                            <a href="#">our cases</a>
                        </li>
                    </ul> -->
                </li>
                <li>
                    <a href="contacts" <?if($this->uri->segment(1) == "contacts"){echo"class='active'";}?>><?=lang("CONTACT_US")?></a>
                    <!-- <ul>
                        <li>
                            <a href="#">work with us</a>
                        </li>
                    </ul> -->
                </li>
            </ul>
        </div>
    </div>
    <!-- <div style="margin-top:-30px;"><input type="text" class="form-search" placeholder="<?=lang("search")?>"></div> -->
</div>
</div>