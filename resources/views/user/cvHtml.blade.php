
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>naposao</title>
<meta name="keywords" content="работа, rabota, jobs, job, обяви, кариера, кариери, karieri, kariera, HR, CV, автобиография">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
		@media screen{
		body{font-family: Verdana, Arial, Helvetica, sans-serif;  color: #000000;  font-size: 11px;  font-style: normal;  text-decoration: none;}
		.cvTable{width:980px;}
		.rowTitleView{font-weight:normal;padding-top:3px;padding-bottom:3px;padding-right:2px;padding-left:10px;text-align:right;width:150px;background-color:#FFFFFF;}
		.rowDataView{font-weight:bold;padding-top:3px;padding-bottom:3px;padding-right:10px;padding-left:10px;text-align:left;line-height:14px;}
		.rowDataViewNormal{font-weight:normal;padding-top:3px;padding-bottom:3px;padding-right:10px;padding-left:10px;text-align:left;line-height:14px;}
		.spanDataView{font-weight:normal;}
		.spanDataViewGrey{font-weight:normal;color:#999999;}
		#printDiv{
			display:block;
		}

	}
	@media print{
		 body{font-family: Verdana, Arial, Helvetica, sans-serif;  color: #000000;  font-size: 11px;  font-style: normal;  text-decoration: none;}
		.cvTable{width:100%;}
		.rowTitleView{font-weight:normal;padding-top:3px;padding-bottom:3px;padding-right:2px;padding-left:10px;text-align:right;width:150px;}
		.rowDataView{font-weight:bold;padding-top:3px;padding-bottom:3px;padding-right:10px;padding-left:10px;text-align:left;}
		.rowDataViewNormal{font-weight:normal;padding-top:3px;padding-bottom:3px;padding-right:10px;padding-left:10px;text-align:left;}
		.spanDataView{font-weight:normal;}
		.spanDataViewGrey{font-weight:normal;color:#999999;}
		#printDiv{
			display:none;
		}

	}
	</style>
</head>
<body bgcolor="#FFFFFF" leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 >
<table cellspacing=0 cellpadding=0 border=0 class="cvTable" align=center>

		<tr><td colspan=2 align="right" style="padding-top:20px;padding-bottom:20px;"><div id="printDiv" name="printDiv" style="width:350px;">
			<div style="padding-top:3px;padding-left:1px;float:right;"><a href="javascript:;" onClick="window.close();return false;" class="MainLink">Close</a></div>
			<div style="height:20px;width:21px;float:right;padding-left:10px;"><a href="javascript:;" onClick="window.close();return false;" class="MainLink"><img alt="" src="images/close_ico.gif" border=0></a></div>

            <div style="padding-top:3px;padding-left:3px;float:right;"><a href="{{ route('generate-pdf',['download'=>'pdf','cvid'=>$cv->id]) }}" class="MainLink">Save as PDF</a></div>
            <div style="height:20px;width:21px;float:right;"><a href="js_cv_preview.php?cv_sid=1366801&pdf=" class="MainLink"><img alt="" src="images/file_type/22/pdf.gif" width="20" border=0></a></div>

			</div>
			</td>
	</tr>
			<tr>
				<td valign=top>
			<table cellspacing=0 cellpadding=0 border=0 width=100%>
				<tr>
					<td><span style="font-size:21px;font-weight:bold;" >{{ $cv->title }}</span></td>
				</tr>
				<tr>
					<td align=right valign=top style="padding-left:100px;">
						<table cellspacing=0 cellpadding=0 border=0>
							<tr>
								<td class="rowTitleView" valign="top">Email:</td>
								<td class="rowDataView"><b>{{ $cv->email }}</b></td>
							</tr>
							@if($cv->phone)
							<tr>
								<td class="rowTitleView" valign="top">Phone:</td>
								<td class="rowDataView">{{ $cv->phone }}</td>
							</tr>
							@endif
							@if($cv->post_address)
							<tr>
								<td class="rowTitleView" valign="top">Post address:</td>
								<td class="rowDataView">{{ $cv->post_address }}</td>
							</tr>
							@endif
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0 class="cvTable" align=center>
	<tr>
		<td colspan=2>
		<div style="padding-bottom:5px;font-weight:bold;font-size:15px;color:#000000;padding-top:20px;">Personal Details</div>
		<table cellspacing=0 cellpadding=0 border=0  width=100% style="border-top:1px solid #000000;">
					<tr>
						<td class="rowTitleView" valign="top" style="width:100px;">First name:</td>
						<td class="rowDataView">{{ $cv->first_name }}</td>
					</tr>
					<tr>
						<td class="rowTitleView" valign="top">Last name:</td>
						<td class="rowDataView">{{ $cv->last_name }}</td>
					</tr>
                    <tr>
                        <td class="rowTitleView" valign="top" style="padding-top:10px;">Gender:</td>
                        <td  class="rowDataView" style="padding-top:10px;">{{ $cv->gender }}</td>
                    </tr>
					@if($cv->birthdate)
					<tr>
                        <td class="rowTitleView" valign="top">Birth date:</td>
                        <td  class="rowDataView">{{ $cv->birthdate }}</td>
                    </tr>
					@endif
					@if($cv->citizenship)
					<tr>
                        <td class="rowTitleView" valign="top">Citizenship:</td>
                        <td class="rowDataView">{{ $cv->citizenship }}</td>
                    </tr>
					@endif
					<tr>
                        <td class="rowTitleView" valign="top" style="padding-top:10px;">I live in:</td>
                        <td class="rowDataViewNormal" style="padding-top:10px;">
                            <b>{{ $cv->city }}</b>@if($cv->country)/{{ $cv->country }} @endif   
						</td>
                    </tr>
		</table>
	@if(count($cv->workHistory))
	<div style="padding-top:20px;padding-bottom:5px;font-weight:bold;font-size:15px;color:#000000;">Work Experience</div>
	<table cellspacing=0 cellpadding=0 border=0 style="border-top:1px solid #000000;" width=100%>
		<tr>
	  		<td valign=top>
				<table cellspacing=0 cellpadding=0 border=0>
				@foreach($cv->workHistory as $workHistory)
					<tr>
						<td class="rowTitleView" valign="top">Period:</td>
						<td class="rowDataView" valign="top">{{$workHistory->month_from}} {{$workHistory->year_from}} - {{$workHistory->month_to}} {{$workHistory->year_to}}</td>
					</tr>
					<tr>
						<td class="rowTitleView" valign="top">Position:</td>
						<td class="rowDataView">{{ $workHistory->position }}</td>
					</tr>
					<tr>
						<td class="rowTitleView" valign="top">Company/Organization:</td>
						<td class="rowDataView">{{ $workHistory->company_name }}</td>
					</tr>
					<tr>
						<td class="rowTitleView" valign="top">Business sector:</td>
						<td class="rowDataViewNormal">{{ $workHistory->business_sector }}</td>
					</tr>
					<tr>
						<td class="rowTitleView" valign="top">Location:</td>
						<td class="rowDataViewNormal">{{ $workHistory->location }}</td>
					</tr>
					@if($workHistory->description)
					<tr>
						<td class="rowTitleView" valign="top">Additional Details:</td>
						<td class="rowDataViewNormal">{{ $workHistory->description }}</td>
					</tr>
					@endif
				@endforeach
				</table>
			</td>
		</tr>
	</table>
	@endif
	@if(count($cv->education))
	<div style="padding-bottom:5px;padding-top:20px;font-weight:bold;font-size:15px;color:#000000;">Education</div>
	<table cellspacing=0 cellpadding=0 border=0 style="border-top:1px solid #000000;" width=100%>
		@foreach($cv->education as $education)
		<tr>
	  		<td valign=top>
				<table cellspacing=0 cellpadding=0 border=0>
					<tr>
						<td class="rowTitleView" valign="top">Period:</td>
						<td class="rowDataView" valign="top">{{ $education->month_from }} {{ $education->year_from }} - {{ $education->month_to }} {{ $education->year_to }}</td>
					</tr>
					<tr>
						<td class="rowTitleView" valign="top">Level:</td>
						<td class="rowDataViewNormal">{{ $education->level }}</td>
					</tr>
					<tr>
						<td class="rowTitleView" valign="top">School:</td>
						<td class="rowDataView">{{ $education->school }}</td>
					</tr>
					<tr>
						<td class="rowTitleView" valign="top">Location:</td>
						<td class="rowDataViewNormal">{{ $education->location }}</td>
					</tr>
					@if($education->description)
					<tr>
						<td class="rowTitleView" valign="top">Description/Main Subjects:</td>
						<td class="rowDataViewNormal">{{ $education->description }}</td>
					</tr>
					@endif
				</table>	
			</td>
		</tr>
		@endforeach
			</table>
			
	@endif
	<br><br><div style="padding-bottom:5px;font-weight:bold;font-size:15px;color:#000000;">Languages</div>
	<table cellspacing=0 cellpadding=0 border=0 style="border-top:1px solid #000000;" width=100%>
		<tr>
			<td valign=top>
				<table cellspacing=0 cellpadding=0 border=0>
					<tr>
						<td class="rowTitleView" valign="top" style="padding-bottom:10px;">Native language:</td>
						<td class="rowDataView" colspan=3  style="padding-bottom:10px;">{{ $cv->native_language }}</td>
					</tr>
					@if($cv->foreign_languages)
					<tr>
						<td class="rowTitleView" valign="top" style="padding-bottom:10px;">Foreign language:</td>
						<td class="rowDataView" colspan=3  style="padding-bottom:10px;">{{ $cv->foreign_languages }}</td>
					</tr>
					@endif
				</table>
			</td>
		</tr>
	</table>
	
	<br><br><div style="padding-bottom:5px;font-weight:bold;font-size:15px;color:#000000;">Skills</div>
	<table cellspacing=0 cellpadding=0 border=0 style="border-top:1px solid #000000;" width=100%>
		<tr>
	  		<td valign=top>
				<table cellspacing=0 cellpadding=0 border=0>
					@if($cv->computer_skills)
					<tr>
						<td class="rowTitleView" valign="top">Computer Skills:</td>
						<td class="rowDataView">{{ $cv->computer_skills }}</td>
					</tr>
					@endif
					@if($cv->skills)
					<tr>
						<td class="rowTitleView" valign="top">Skills:</td>
						<td class="rowDataView">{{ $cv->skills }}</td>
					</tr>
					@endif
					<tr>
						<td class="rowTitleView" valign="top">Driving License:</td>
						<td class="rowDataView">{{ $cv->driving_licence }}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	


		</td>
	</tr>	
	<tr>
		<td colspan=2 align=right style="padding-top:20px;"><img alt="" src="{{ URL::to('/public')}}/photos/naposaologo.png"></td>
	</tr>
</table>
</body>
</html>