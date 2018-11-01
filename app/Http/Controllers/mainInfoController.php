<?php

namespace App\Http\Controllers;
use App\User;
use App\education;
use App\experience;
use App\languages;
use App\skills;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
$vis = array();
class mainInfoController extends Controller
{
    public function show($id){
    	$user   = User::find($id);
    	$edus   = education::find($id);
    	$exps   = experience::find($id);
    	$skills = DB::table('skills')->where('user_id',$id)->get();
    	$langs  = languages::find($id);
        $levels = array('-','Elementary proficiency','Limited working Proficiency','Professional working proficiency','Full professional proficiency','Native or bilingual proficiency');

    	return view('pages.profile',compact('user','edus','exps','skills','langs','levels'));
    }

    public function edit($id){
    	$user = User::find($id);

    	$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

    	return view('pages.edit',compact('user','countries'));
    }

    public function update(Request $req, $id){
    	if(Auth::user()->id == $id){
            
            if($req->has('subEdit')){
                $this->validate($req, [
                    'image' => 'image|nullable|max:1999'
                ]);
                
            	// Handle File Upload
            	if($req->hasFile('image')){
                    
            		// Get filename with extension
            		$fileNameWithExt = $req->file('image')->getClientOriginalName();
            		// Get just filename
            		$filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            		// Get just ext
            		$extension = $req->file('image')->getClientOriginalExtension();

            		// Filename To Store
            		$fileNameToStore = $filename .'_'.time().'.'.$extension;
            		// Upload Image
                    $path= $req->file('image')->storeAs('public/images',$fileNameToStore);
            	}else{
            		$fileNameToStore = 'https://gulfupload.com/i/00020/epd6ocrr5nfu_t.jpg';
            	}
                //dd($fileNameToStore);
            	$user = User::find($id);
            	$user->fname = $req->input('fname');
            	$user->lname = $req->input('lname');
            	$user->username = $req->input('username');
            	$user->phone = $req->input('phone');
            	$user->location = $req->input('location');
            	$user->website = $req->input('website');
                if($req->hasFile('image')){
                    $user->image = $fileNameToStore;
                }
            	$user->save();
            	return redirect("/profile/$id");
            }

            // Update Education Block

            if($req->has('editEdu')){

                $iid = intval($req->iid);
                $major  = $req->input('major');
                $degree = $req->input('degree');
                $school = $req->input('school');
                $fyear  = $req->input('fyear'); 
                $tyear  = ($req->input('tyear') == "" ? "Present" : $req->input('tyear'));

                DB::table('educations')
                ->where('id',$iid)
                ->update(['user_id' => Auth::user()->id , 'major' => $major , 'degree' => $degree , 'school' => $school , 'fyear' => $fyear , 'tyear' => $tyear]);

                return redirect("/profile/$id");  
            }

            // Update Experience Block
            
            if($req->has('editExp')){
                $iid     = inval($req->iid);
                $title   = $req->input('title');
                $company = $req->input('company');
                $fyear   = $req->input('fyear');
                $tyear   = $req->input('tyear');

                DB::table('experiences')
                ->where('id',$iid)
                ->update(['user_id' => Auth::user()->id, 'title'=>$title , 'company' => $company , 'fyear' => $fyear , 'tyear' => $tyear]);

                return redirect("/profile/$id"); 
            }

            // Update Language Block
            if($req->has('editLang')){
                
                $idd      = intval($req->iid);
                $level    = $req->input('level');
                $language = $req->input('language');

                DB::table('languages')
                ->where('id',$iid)
                ->update(['user_id'=>Auth::user()->id , 'language' => $language , 'level' => $level]);

                return redirect("/profile/$id"); 
            }

            if($req->has('editSkills')){
                $skills =  $req->skills;
                DB::table('skills')->where('user_id',intval($req->iid))->delete();
                //dd($req->skills);
                unset($vis);
                $vis = array();
                foreach ($skills as $skill) {
                    if(!isset($vis[strtolower($skill)]))
                        DB::table('skills')->insert(['user_id' => Auth::user()->id , 'skill' => $skill]);
                    $vis[strtolower($skill)] = true;  
                }

                return redirect("/profile/$id");   
            }
        }
    }

    public function store(Request $req , $id){
        
        // Store language 
        if($id == Auth::user()->id){
        if($req->has('subLangs')){
			$lang = new languages;

	        $lang->language = $req->input('language');
	        $lang->level = $req->input('level'); 
	        $lang->user_id = Auth::user()->id;
	        $lang->save();
	        return redirect("/profile/$id");
        }

        // Store Education
        
        if($req->has('subEdus')){
        	$edu = new education;
	    	$edu->major = $req->input('major');
	    	$edu->degree = $req->input('degree');
	    	$edu->school = $req->input('school');
	    	$edu->fyear = $req->input('fyear');
	    	if(empty($req->input('tyear'))){
        		$edu->tyear = "Present";
        	}else{
        		$edu->tyear = $req->input('tyear');
        	}
	    	$edu->user_id = Auth::user()->id;
	    	$edu->save();
	    	return redirect("/profile/$id");
        }

        // Store Experience

        if($req->has('subExps')){
        	$exp = new experience;

        	$exp->title = $req->input('title');
        	$exp->company = $req->input('company');
        	$exp->company = $req->input('company');
        	$exp->fyear = $req->input('fyear');
        	if(empty($req->input('tyear'))){
        		$exp->tyear = "Present";
        	}else{
        		$exp->tyear = $req->input('tyear');
        	}
        	
        	$exp->desc = $req->input('desc');
        	$exp->user_id = Auth::user()->id;
        	$exp->save();
        	return redirect("/profile/$id");
        }

        // Store Skills 
        
        if($req->has('subSkills')){
        	$all = $req->all();
        	
        	//dd($all['skills']);
        	foreach ($all['skills'] as $s) {
        		//dd(Auth::user()->id);
        		$skl = new skills;
        		$skl->skill = $s;
        		$skl->user_id = Auth::user()->id;
        		$skl->save();
        	}
        	return redirect("/profile/$id");
        }
    }
    }


}


