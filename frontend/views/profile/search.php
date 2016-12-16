<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">New Matches</li>
     </ul>
   </div>

  <div class="profile_search">
      <div class="container wrap_1">
        <form action="">
          <div class="search_top">
            <div class="inline-block">
              <label class="gender_1">I am looking for :</label>
              <div class="age_box1" style="max-width: 100%; display: inline-block;">
                <select>
                  <option value="">* Select Gender</option>
                  <option value="Male">Bride</option>
                  <option value="Female">Groom</option>
                </select>
              </div>
            </div>
            <div class="inline-block">
              <label class="gender_1">Located In :</label>
                <div class="age_box1" style="max-width: 100%; display: inline-block;">
                  <select>
                      <option value="">* Select State</option>
                      <option value="Washington">Washington</option>
                      <option value="Texas">Texas</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Virginia">Virginia</option>
                      <option value="Colorado">Colorado</option>
                  </select>
                </div>
            </div>
            <div class="inline-block">
              <label class="gender_1">Interested In :</label>
                <div class="age_box1" style="max-width: 100%; display: inline-block;">
                  <select>
                    <option value="">* Select Interest</option>
                    <option value="Sports &amp; Adventure">Sports &amp; Adventure</option>
                    <option value="Movies &amp; Entertainment">Movies &amp; Entertainment</option>
                    <option value="Arts &amp; Science">Arts &amp; Science</option>
                    <option value="Technology">Technology</option>
                    <option value="Fashion">Fashion</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="inline-block">
            <div class="age_box2" style="max-width: 220px;">
              <label class="gender_1">Age :</label>
              <input class="transparent" placeholder="From:" style="width: 34%;" type="text" value="">&nbsp;-&nbsp;<input class="transparent" placeholder="To:" style="width: 34%;" type="text" value="">
            </div>
          </div>
          <div class="inline-block">
            <label class="gender_1">Status :</label>
            <div class="age_box1" style="max-width: 100%; display: inline-block;">
              <select>
                <option value="">* Select Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="In a Relationship">In a Relationship</option>
                <option value="It's Complicated">It's Complicated</option>
              </select>
            </div>
          </div>
          <div class="submit inline-block">
             <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches">
          </div>
        </form>
      </div>
    </div>  

  <div class="col-md-3 match_right">
    <ul class="menu">
		<li class="item1"><h3 class="m_2">Show Profiles Created</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">within a week (2) </a></li>
			<li class="subitem2"><a href="#">within a month (4)</a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Profile type</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">with Photo (3) </a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Marital Status</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">Unmarried (2) </a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Mother Tongue</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">English </a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Education</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">Bachelors-Engineering </a></li>
			<li class="subitem1"><a href="#">Masters-Engineering </a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Occupation</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">Engineer-Non IT (2) </a></li>
			<li class="subitem1"><a href="#">Software Professional (3)</a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Physical Status</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">Normal (2) </a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Eating Habits</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">Non Vegetarian (3)</a></li>
			<li class="subitem1"><a href="#">Vegetarian (2)</a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Smoking</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">Not Specified (3)</a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Drinking</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">Not Specified (3)</a></li>
			<li class="subitem1"><a href="#">Never Drinks (3)</a></li>
		  </ul>
		</li>
		<li class="item1"><h3 class="m_2">Profile Created by</h3>
		  <ul class="cute">
			<li class="subitem1"><a href="#">Self (1)</a></li>
		  </ul>
		</li>
	  </ul>
   </div>

   <div class="col-md-9 profile_left2">
        <!--<form>
        <div class="form_but2">
            <label class="col-md-2 control-lable1" for="sex">Don't Show : </label>
            <div class="col-md-10 form_radios">
                <input type="checkbox" class="radio_1"> Don't show already viewed &nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="radio_1" checked="checked"> Don't show already contacted &nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="radio_1" checked="checked"> Show profiles with photo
            </div>
            <div class="clearfix"> </div>
        </div>
        </form>
    -->





        <?= 
        \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'layout' => "{pager}\n{items}\n{summary}",
            'itemView' => '_list_item',
        ]);
        ?>



    
  </div>

   <div class="clearfix"> </div>
  </div>
</div>