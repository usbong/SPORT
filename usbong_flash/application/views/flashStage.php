<!--
' Copyright 2020~2022 SYSON, MICHAEL B.
'
' Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You ' may obtain a copy of the License at
'
' http://www.apache.org/licenses/LICENSE-2.0
'
' Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, ' WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing ' permissions and limitations under the License.
'
' @company: USBONG
' @author: SYSON, MICHAEL B.
' @date created: 20200306
' @date updated: 20220915; from 20220914
'
' Note: re-used computer instructions mainly from the following:
'	1) Usbong Knowledge Management System (KMS);
'	2) Usbong Flash;
-->
<?php

//TO-DO: -delete: excess instructions

//added by Mike, 20220827
//observed: css+HTML OUTPUT error in iPAD (Safari browser), but NOT in MacBookPro (Firefox browser; Safari browser error)
//observed: no sound output from .m4a via Android Firefox
//TO-DO: -update: sound file from .m4a to .mp3 via Musescore, et cetera

//TO-DO: -add: auto-update positions after screen resize of computer browser
//TO-DO: -fix: exit from full screen mode causes INCORRECT object position due to page scrolling


defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">

    <!-- Reference: Apache Friends Dashboard index.html -->
    <!-- "Always force latest IE rendering engine or request Chrome Frame" -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <style type="text/css">
	/**/
	                    body
                        {
                            font-family: Arial;
							font-size: 11pt;
								
							/* edited by Mike, 20220911
							width: 640px; 
							*/
							width: 100%; /*90%; 80%;*/
							padding: 0;
							margin: 0;
						}
						
						/* added by Mike, 20220911 */
	                    body.bodyPortraitMode
                        {
                            font-family: Arial;
							font-size: 11pt;
							width: 100%; /*80%;*/
							height: 100%;
							padding: 0;
							margin: auto;
						}						

	                    body.bodyLandscapeMode
                        {
                            font-family: Arial;
							font-size: 11pt;
							width: 100%; /*80%;*/
							height: 100%; /*80%;*/
							padding: 0;
							margin: auto;
						}						
						
						canvas.myCanvas {
							
							/*width: 100%;*/ /*80%;*/ /*160px; */
							/*height: 100%;*/ /*80%;*/ /*144px;*/ 
							
							/*reference: https://stackoverflow.com/questions/5127937/how-to-center-canvas-in-html5; last accessed: 20220911
							answer by: Marco Luglio, 20111016T0357
							*/
							
							padding: 0;
							margin: auto;
							display: block;
							width: 320px; /*160px*2;*/	
							height: 288px; /*144px*2;*/							
						}
						
						audio.myAudio
						{
							width: 416px;
							height: 312px;
						}
						
						a.executeLink
						{
							left: 0px;
							top: 0px;
							position: absolute;
							
							padding: 12px;
							background-color: #ffe400;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 4px;							
						}

						div.checkBox
						{
								border: 1.5pt solid black; height: 9pt; width: 9pt;
								text-align: center;
								float: left
						}
						
						div.option
						{
								padding: 2pt;
								display: inline-block;
						}
						
						div.copyright
						{
								text-align: center;
						}
						
						div.patientName
						{
							text-align: left;
						}						

						div.medicalDoctorName
						{
							text-align: left;
						}						
						
						div.tableHeader
						{
							font-weight: bold;
							text-align: center;
							background-color: #00ff00; <!--#93d151; lime green-->
							border: 1pt solid #00ff00;
						}					

						div.tableHeaderAddNewPatient
						{
							font-weight: bold;
							text-align: center;
							background-color: #ff8000; <!--#93d151; lime green-->
							border: 1pt solid #ff8000;
						}						
						
						input.browse-input
						{
							width: 100%;
							max-width: 500px;
														
							resize: none;

							height: 100%;
						}	

						img.Image-companyLogo {
							max-width: 60%;
							height: auto;
							float: left;
							text-align: center;
							padding-left: 20px;
							padding-top: 10px;
						}

						img.Image-moscLogo {
							max-width: 20%;
							height: auto;
							float: left;
							text-align: center;
						}						
						
						table.addPatientTable
						{
							border: 2px dotted #ab9c7d;		
							margin-top: 10px;
						}						
						
						
						table.search-result
						{
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table.imageTable
						{
							width: 100%;
<!--							border: 1px solid #ab9c7d;		
-->
						}						

						table
						{
							border-collapse: collapse;
							 
							padding: 0;		
							margin: 0;

							/*added by: Mike, 20220830 */
							overflow: hidden;
							
							/*added by: Mike, 20220902; 
							  note: effect */							
							/*border: 1px dotted #ab9c7d;*/							
							
							/*added by Mike, 20220902;
							  still INCORRECT OUTPUT;
							display: block;
							max-width:640px;							
							*/
						}
						

						tr
						{
							padding: 0;		
							margin: 0;
						}						

						td 
						{
							padding: 0;		
							margin: 0;
						}						

						td.column
						{
							border: 1px dotted #ab9c7d;		
							text-align: right							
						}						
						
						td.imageColumn
						{
							width: 40%;
							display: inline-block;
						}				

						td.pageNameColumn
						{
							width: 50%;
							display: inline-block;
							text-align: right;
						}
						
						.Button-emptyStonePosCornerTopLeftPillar {
							padding: 10px;

							/*added by: Mike, 20220830 */
							overflow: hidden;								
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

/*	//removed by Mike, 20220830

							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;

							/* note: negative VALUE for opposite side */

							box-shadow:inset 2px 2px 0 0px black;		
						}

						.Button-emptyStonePosCornerTopLeftPillar:hover {
							background-color: #b80000;
							border-radius: 45px;
							box-shadow:inset 0px 0px 0 0px black;														
						}

						.Button-emptyStonePosCornerTopLeftPillar:focus {
							background-color: #b80000;
							box-shadow:inset 0px 0px 0 0px black;														
						}
						
						.Button-emptyStonePosCornerTopLeft {
							padding: 10px;

/* //added by Mike, 20220830
   //reference: https://stackoverflow.com/questions/3795888/extra-padding-on-chrome-safari-webkit-any-ideas;
   //last accessed: 20220830
   //"This has to do with the way margins collapse together so that two margins between elements don't accumulate."
   //answer by: Andrew Vit, 20100926T0001
*/
							overflow: hidden;	
							
							background-color: #ff9300;

/*	//removed by Mike, 20220830
							color: #222222;
*/

							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

/*	//removed by Mike, 20220830
							float: left;
*/
							margin: 0px;
						}

						.Button-emptyStonePosCornerTopLeft:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerTopLeft:focus {
							background-color: #b80000;
						}

/*
	TOP-RIGHT CORNER
*/
						.Button-emptyStonePosCornerTopRightPillar {
							padding: 10px;
							
							/*added by: Mike, 20220830 */
							overflow: hidden;	
														
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							float: left;
							
							/* added by Mike, 20220830 */
							margin: 0px;
							
						
							/* note: negative VALUE for opposite side */
							box-shadow:inset -2px 2px 0 0px black;														
						}

						.Button-emptyStonePosCornerTopRightPillar:hover {
							background-color: #b80000;
							border-radius: 45px;
							box-shadow:inset 0px 0px 0 0px black;														
						}

						.Button-emptyStonePosCornerTopRightPillar:focus {
							background-color: #b80000;
							box-shadow:inset 0px 0px 0 0px black;														
						}
						
						.Button-emptyStonePosCornerTopRight {
							padding: 10px;

							/*added by: Mike, 20220830 */
							overflow: hidden;								
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
						}

						.Button-emptyStonePosCornerTopRight:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerTopRight:focus {
							background-color: #b80000;
						}
						

/*
	BOTTOM-LEFT CORNER
*/
						.Button-emptyStonePosCornerBottomLeftPillar {
							padding: 10px;
							
							/*added by: Mike, 20220830 */
							overflow: hidden;							
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;


							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
							

							/* note: negative VALUE for opposite side */
							box-shadow:inset 2px -2px 0 0px black;														
						}

						.Button-emptyStonePosCornerBottomLeftPillar:hover {
							background-color: #b80000;
							border-radius: 45px;
							box-shadow:inset 0px 0px 0 0px black;														
						}

						.Button-emptyStonePosCornerBottomLeftPillar:focus {
							background-color: #b80000;
							box-shadow:inset 0px 0px 0 0px black;														
						}
						
						.Button-emptyStonePosCornerBottomLeft {
							padding: 10px;

							/*added by: Mike, 20220830 */
							overflow: hidden;								
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
						}

						.Button-emptyStonePosCornerBottomLeft:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerBottomLeft:focus {
							background-color: #b80000;
						}
						
/*
	BOTTOM-RIGHT CORNER
*/
						.Button-emptyStonePosCornerBottomRightPillar {
							padding: 10px;

							/*added by: Mike, 20220830 */
							overflow: hidden;						
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
						
							/* note: negative VALUE for opposite side */
							box-shadow:inset -2px -2px 0 0px black;														
						}

						.Button-emptyStonePosCornerBottomRightPillar:hover {
							background-color: #b80000;
							border-radius: 45px;
							box-shadow:inset 0px 0px 0 0px black;														
						}

						.Button-emptyStonePosCornerBottomRightPillar:focus {
							background-color: #b80000;
							box-shadow:inset 0px 0px 0 0px black;														
						}
						
						.Button-emptyStonePosCornerBottomRight {
							padding: 10px;
							
							/*added by: Mike, 20220830 */
							overflow: hidden;								
							
							background-color: #ff9300;
							color: #222222;
							font-size: 16px;
							font-weight: bold;

							border: 0px solid;		
							border-radius: 0px;

							/* removed by Mike, 20220830 */
/*							float: left;
*/
							/* added by Mike, 20220830 */
							margin: 0px;
						}

						.Button-emptyStonePosCornerBottomRight:hover {
							background-color: #b80000;
							border-radius: 45px;
						}

						.Button-emptyStonePosCornerBottomRight:focus {
							background-color: #b80000;
						}
						
						/* noted by Mike, 20220820
						using: absolute positions; 
						add: auto-identify IF mobile*/
						.Image64x64Tile {
							position: absolute;
  							clip: rect(0px,64px,64px,0px);
						}
						
						.Image64x64TileFrame1 {
							position: absolute;
  							clip: rect(0px,64px,64px,0px);

							/* //added by Mike, 20220904; removed by Mike, 20220904
								TO-DO: -verify: @set vertex, e.g. center */
							/*
								transform: rotate(-15deg);
							*/
						}

						.Image64x64TileFrame2 {
							position: absolute;
  							/*clip: rect(0px,128px,64px,64px);*/
  							clip: rect(0px,64px,64px,0px);
							object-position: -64px; /*TO-DO: -add: current position*/
						}
						
						.Image64x64TileBackground {
							position: absolute;
  							clip: rect(0px,64px,64px,0px);

							/* //added by Mike, 20220904; removed by Mike, 20220904
								TO-DO: -verify: @set vertex, e.g. center */
							/*
								transform: rotate(-15deg);
							*/
						}

						
						/* added by Mike, 20220825 
						reference: https://stackoverflow.com/questions/15533636/playing-sound-in-hidden-tag; last accessed: 20220825
						//answer by: couzzi, 20130320T2013						
						*/
						audio { 
							display:none;
						}
						

<!-- Reference: https://stackoverflow.com/questions/7291873/disable-color-change-of-anchor-tag-when-visited; 
	last accessed: 20200321
	answer by: Rich Bradshaw on 20110903T0759
	edited by: Peter Mortensen on 20190511T2239
-->
						a {color:#0011f1;}         /* Unvisited link  */
						a:visited {color:#0011f1;} /* Visited link    */
						a:hover {color:#0011f1;}   /* Mouse over link */
						a:active {color:#593baa;}  /* Selected link */												
    /**/
    </style>
    <title>
      囲碁 STAGE
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
    </style>
  
  <base href="http://store.usbong.ph/"> <!--target="_blank"-->
  
  </head>
	  <script>
	  
//added by Mike, 20220910
//notes:	  
--> verifying: Gameboy Control Scheme as executed on Mobile, e.g. ANDROID
--> "Keep the original GameBoy screen resolution of 160px x 144px."
--> https://itch.io/jam/gbjam-9; last accessed: 20220909	  
	  
	  
//added by Mike, 20220912
//note: landscape screen size in SUPER FANTASY ZONE, DEFENDER ARCADE
//keyphrase: FLYING, PlayStation Portable, Nintendo Switch Lite
//current: gameboy color screen ratio; 160x144, w x h
const iStageMaxWidth=160*2; //160;
const iStageMaxHeight=144*2; //144;

var iHorizontalOffset=0;
var iVerticalOffset=0;

//added by Mike, 20220912
//TO-DO: -add: this in INIT
//use only 90% of screen width to eliminate horizontal scrolling in browser	
//verified: computation to be exact with 100%; 
//TO-DO: verfiy: with safari browser, et cetera;
//TO-DO: -add: grid tiles;
iHorizontalOffset=(screen.width)/2-iStageMaxWidth/2;
//iHorizontalOffset=(screen.width*0.90)/2-iStageMaxWidth/2;
//iHorizontalOffset=(screen.width*0.80)/2-iStageMaxWidth/2;
	  	  
//added by Mike, 20220829
const iImgIpisTileAnimationCountMax=6;
iImgIpisTileAnimationCount=0;	  

//added by Mike, 20220915
iIpisNumber2StepY=10;
	  
//added by Mike, 20220822
//OK; this technique solves noticeable delay when holding the key press;
//can add simultaneous keypresses;
//edited by Mike, 20220823
//bKeyDownRight = false;
const iKEY_W = 0;
const iKEY_S = 1;
const iKEY_A = 2;
const iKEY_D = 3;

const iTotalKeyCount = 4;

//https://www.w3schools.com/js/js_arrays.asp; last accessed: 20220823
const arrayKeyPressed = [];
for (iCount=0; iCount<iTotalKeyCount; iCount++) {
	arrayKeyPressed[iCount]=false;
}


/*
//added by Mike, 20220825
//reference: https://www.w3schools.com/jsref/met_audio_play.asp;
//last accessed: 20220825
var x = document.getElementById("myAudioId");

function playAudio() {
  x.play();
}

function pauseAudio() {
  x.pause();
} 
*/


//--
	//note: learned: to be doable via Android (Samsung Galaxy S Duos)
	//after observing successful execution of the following:
	//1) https://invertedhat.itch.io/postie; last accessed: 20220825
	//2) https://allalonegamez.itch.io/rewind-time; last accessed: 20220825
	//
	//reference: https://developer.mozilla.org/en-US/docs/Web/API/Fullscreen_API;
	//last accessed: 20220825
	function toggleFullScreen() {
	  //added by Mike, 20220825
	  //playAudio();
	  document.getElementById("myAudioId").play();

	  if (!document.fullscreenElement) {
		document.documentElement.requestFullscreen();
	  } else if (document.exitFullscreen) {
		document.exitFullscreen();
	  }
	}

	document.addEventListener("keydown", (e) => {
	  if (e.key === "Enter") {
		toggleFullScreen();
	  }
	}, false);
//--

// NOTE:
//reference: https://stackoverflow.com/questions/8663246/javascript-timer-loop;
//last accessed: 20220424
//answer by: keyboardP, 20111229T0158
//edited by: Ken Browning, 20111229T0200
//edited by Mike, 20220820

function myUpdateFunction() {
//	alert("count!");
	//TO-DO: -add: update logic	
	//--> TO-DO: -add: collision detection and output
	
	//TO-DO: -add: re-draw stage/canvas
	
	var imgUsbongLogo = document.getElementById("usbongLogoId");
	//imgUsbongLogo.style.visibility="hidden";
	
	//added by Mike, 20220820
	var imgIpisTile = document.getElementById("ipisTileImageId");

	//added by Mike, 20220904
	var imgIpisTileNumber2 = document.getElementById("ipisTileImageIdNumber2");


/* //removed by Mike, 20220827; output: still noticeable delay in animation of ipis
	if(imgUsbongLogo.style.visibility === "visible"){
	  imgUsbongLogo.style.visibility="hidden";
	}
	else {
	  imgUsbongLogo.style.visibility="visible";
	}	
*/

	//added by Mike, 20220904
	//ANIMATION UPDATE
	 
	//added by Mike, 20220820
	//if class exists, remove; else, add the class;
	//imgIpisTile.classList.toggle('Image64x64TileFrame2');	 

	//reference: https://www.w3schools.com/jsref/prop_html_classname.asp;
	//last accessed: 20220820
	
	//added by Mike, 20220829
	//TO-DO: -add: this in Ipis class(-ification) container, et cetera
	if (iImgIpisTileAnimationCount==iImgIpisTileAnimationCountMax) {
		if (imgIpisTile.className=='Image64x64TileFrame1') {
		  imgIpisTile.className='Image64x64TileFrame2';
		  
		  //added by Mike, 20220904
		  imgIpisTileNumber2.className='Image64x64TileFrame1';
		}
		else {
		  imgIpisTile.className='Image64x64TileFrame1';

		  imgIpisTileNumber2.className='Image64x64TileFrame2';
		}
		iImgIpisTileAnimationCount=0;
	}
	else {
		iImgIpisTileAnimationCount++;
	}
	

	//added by Mike, 20220904
	//TO-DO: -add: smaller window inside browser window;
	//where: scrolling tool OFF
	//edited by Mike, 20220911
	//reference: https://www.youtube.com/watch?v=h2EpwYFfrfY; 
	//last accessed: 20220911
	//SAKURAI, MASAHIRO YOUTUBE CHANNEL: 星のカービィ 夢の泉の物語	
/*
	iStageMaxWidth=300;//640;
	iStageMaxHeight=300;//480;
*/
	//notes: OUTPUT appears to be 160/320 = 1/2 of canvas width...
/*
	iStageMaxWidth=160; //160;
	iStageMaxHeight=144; //144;
*/	

/* //removed by Mike, 20220912
	//edited by Mike, 20220911
	//note: landscape screen size in SUPER FANTASY ZONE, DEFENDER ARCADE
	//keyphrase: FLYING, PlayStation Portable, Nintendo Switch Lite
	//current: gameboy color screen ratio; 160x144, w x h
	iStageMaxWidth=160*2; //160;
	iStageMaxHeight=144*2; //144;

	var iHorizontalOffset=0;
	var iVerticalOffset=0;
*/

	//reference: https://www.w3schools.com/tags/canvas_fillrect.asp; 
	//last accessed: 2020911
	var myCanvas = document.getElementById("myCanvasId");
	var myCanvasContext = myCanvas.getContext("2d");
	//TO-DO: -add: center align of bigger window 
	//TO-DO: -reverify: this
	myCanvasContext.fillRect(0, 0, iStageMaxWidth, iStageMaxHeight);	

//alert (iHorizontalOffset);

myCanvas.style.left = (iHorizontalOffset+0)+"px";			

//	iHorizontalOffset=(screen.width*0.90)/2-iStageMaxWidth/2;

			//mdo2.style.left = (iHorizontalOffset+0)+"px";			

		
	//identify offset due to smaller window centered @horizontal
/*	
	alert(screen.width);
	alert(screen.height);
*/

/* //removed by Mike, 20220912
	//use only 90% of screen width to eliminate horizontal scrolling in browser	
	//verified: computation to be exact with 100%; 
	//TO-DO: verfiy: with safari browser, et cetera;
	//TO-DO: -add: grid tiles;
	//iHorizontalOffset=(screen.width)/2-iStageMaxWidth/2;
	iHorizontalOffset=(screen.width*0.90)/2-iStageMaxWidth/2;
*/
		
	//added by Mike, 20220821; OK
	//note: myUpdateFunction() executes only 
	//when Web Browser is set to be FOCUSED;
/*	
	let imgIpisTileX = imgIpisTile.getBoundingClientRect().x;
*/	
	//edited by Mike, 20220822; OK
	//imgIpisTile.style.left =  imgIpisTileX+1+"px";	
	
	
	//added by Mike, 20220822
	//update logic; object positions
	//var imgIpisTile = document.getElementById("ipisTileImageId");
	
	//added by Mike, 20220904
	//KEY INPUT UPDATE	
	
	let imgIpisTileX = imgIpisTile.getBoundingClientRect().x;
	let imgIpisTileY = imgIpisTile.getBoundingClientRect().y;	

	//added by Mike, 20220911
	let iImgIpisTileWidth = 64;
	let iImgIpisTileHeight = 64;
	
	//edited by Mike, 20220823
	let iStepX=10; //4;
	let iStepY=10; //4;
	
	//note: simultaneous keypresses now OK ;
	
	//edited by Mike, 20220823
	//if (bKeyDownRight) { //key d
	if (arrayKeyPressed[iKEY_D]) {
		imgIpisTile.style.left =  imgIpisTileX+iStepX+"px";				
	}	
	else if (arrayKeyPressed[iKEY_A]) {
		imgIpisTile.style.left =  imgIpisTileX-iStepX+"px";				
	}
	
	//note: inverted Y-axis; where: @top of window is 0px
	if (arrayKeyPressed[iKEY_W]) {
		imgIpisTile.style.top =  imgIpisTileY-iStepY+"px";				
	}	
	else if (arrayKeyPressed[iKEY_S]) {
		imgIpisTile.style.top =  imgIpisTileY+iStepY+"px";				
	}
	
	
	//added by Mike, 20220904
	//COLLISION DETECTION UPDATE
	
	mdo1=imgIpisTile;
	mdo2=imgIpisTileNumber2;

/*
	//reference: https://github.com/usbong/usbongV2/blob/main/MyDynamicObject.cpp;
	//last accessed: 20220904
	bool MyDynamicObject::isIntersectingRect(MyDynamicObject* mdo1, MyDynamicObject* mdo2) {     
		if (mdo2->getYPos()+mdo2->getHeight() < mdo1->getYPos() || //is the bottom of mdo2 above the top of mdo1?
			mdo2->getYPos() > mdo1->getYPos()+mdo1->getHeight() || //is the top of mdo2 below bottom of mdo1?
			mdo2->getXPos()+mdo2->getWidth() < mdo1->getXPos()  || //is the right of mdo2 to the left of mdo1?
			mdo2->getXPos() > mdo1->getXPos()+mdo1->getWidth()) { //is the left of mdo2 to the right of mdo1?
			return false;
		}
	
		return true;
	}
*/

	if (isIntersectingRect(mdo1, mdo2)) {
		//alert("COLLISION!");
		mdo2.style.visibility="hidden";
	}
	
	//regenerate
	if (mdo2.style.visibility=="hidden") {
		
		let mdo2XPos = mdo2.getBoundingClientRect().x;
		let mdo2YPos = mdo2.getBoundingClientRect().y;	

/*	
		mdo2.style.left =  mdo2XPos+iStepX+"px";				
		mdo2.style.left =  mdo2YPos-iStepX+"px";
*/		
		//remembers: BOSS Battle with PANIKI in ALAMAT ng AGIMAT (J2ME)
		//reference: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random;
		//last accessed: 20220904

		let iMax = 4;		
		iCorner = Math.floor(Math.random() * iMax); 
		//clock-wise count, 
		//where: 0 = TOP-LEFT, 1 = TOP-RIGHT, 2, = BOTTOM-RIGHT, 4 = BOTTOM-LEFT
		
		if (iCorner==0) { //TOP-LEFT
			//edited by Mike, 20220911
			//mdo2.style.left = "0px";				
			mdo2.style.left = (iHorizontalOffset+0)+"px";			
			mdo2.style.top =  "0px";
		}
		else if (iCorner==1) { //TOP-RIGHT
			//edited by Mike, 20220911
			//mdo2.style.left = iStageMaxWidth+"px";				
			mdo2.style.left = (iHorizontalOffset+iStageMaxWidth-iImgIpisTileWidth)+"px";			
			mdo2.style.top =  "0px";
		}
		else if (iCorner==2)  { //BOTTOM-RIGHT
			//edited by Mike, 20220911
			//mdo2.style.left = iStageMaxWidth+"px";				
			mdo2.style.left = (iHorizontalOffset+iStageMaxWidth-iImgIpisTileWidth)+"px";
			//mdo2.style.top = iStageMaxHeight+"px";
			mdo2.style.top =  (iStageMaxHeight-iImgIpisTileHeight)+"px";
		}
		else if (iCorner==3) { //BOTTOM-LEFT
			//edited by Mike, 20220911
			//mdo2.style.left = "0px";				
			mdo2.style.left = (iHorizontalOffset+0)+"px";				
			//mdo2.style.top = iStageMaxHeight+"px";
			mdo2.style.top =  (iStageMaxHeight-iImgIpisTileHeight)+"px";
		}

		mdo2.style.visibility="visible";	
	}
	
	
	//added by Mike, 20220915
	//verified: object position movement in Android Samsung Duos
	//to be NOT noticeably delayed for moving object count = 1

	let imgIpisNumber2TileX = imgIpisTileNumber2.getBoundingClientRect().x;
	let imgIpisNumber2TileY = imgIpisTileNumber2.getBoundingClientRect().y;	
	
	//imgIpisTileNumber2.style.left = screen.width/2 +"px"; //"100px";
	//iIpisNumber2StepY=10;	
	
	//alert(iImgIpisTileHeight);
	//alert(imgIpisNumber2TileY+iImgIpisTileHeight+iIpisNumber2StepY);
	//alert(iVerticalOffset);
	
	if (imgIpisNumber2TileY+iIpisNumber2StepY<(iVerticalOffset+0)) {
		iIpisNumber2StepY=10; //*=-1;
	}
	else if (imgIpisNumber2TileY+iImgIpisTileHeight+iIpisNumber2StepY>(iVerticalOffset+iStageMaxHeight)) {
		iIpisNumber2StepY=-10;
		
		//alert (imgIpisTileNumber2.style.top);
	}

	imgIpisTileNumber2.style.top = 0+iVerticalOffset+imgIpisNumber2TileY+iIpisNumber2StepY +"px"; 
	imgIpisTileNumber2.style.left = 0+iHorizontalOffset+"px"; 
}

/* //removed by Mike, 20220904
//added by Mike, 20220904
//version 1; no offset, et cetera yet
//@return bool
function isIntersectingRect(mdo1, mdo2) {
	
	let mdo1XPos = mdo1.getBoundingClientRect().x;
	let mdo1YPos = mdo1.getBoundingClientRect().y;			
	let mdo1Width = 64; //mdo1.getBoundingClientRect().width;
	let mdo1Height = 64; //mdo1.getBoundingClientRect().height;			

	let mdo2XPos = mdo2.getBoundingClientRect().x;
	let mdo2YPos = mdo2.getBoundingClientRect().y;			
	let mdo2Width = 64; //mdo2.getBoundingClientRect().width;
	let mdo2Height = 64; //mdo2.getBoundingClientRect().height;			
	
//	alert("mdo1XPos: "+mdo1XPos+"; "+"mdo1Width: "+mdo1Width);	
//	alert("mdo2XPos: "+mdo2XPos+"; "+"mdo2Width: "+mdo2Width);
	
	if ((mdo2YPos+mdo2Height < mdo1YPos) || //is the bottom of mdo2 above the top of mdo1?
		(mdo2YPos > mdo1YPos+mdo1Height) || //is the top of mdo2 below the bottom of mdo1?
		(mdo2XPos+mdo2Width < mdo1XPos) || //is the right of mdo2 to the left of mdo1?
		(mdo2XPos > mdo1XPos+mdo1Width)) //is the left of mdo2 to the right of mdo1?
	{		
		//no collision
		return false;
	}
	
	return true;
}
*/

//added by Mike, 20220904
//version 2; with offset, et cetera
//@return bool
function isIntersectingRect(mdo1, mdo2) {
	
	let mdo1XPos = mdo1.getBoundingClientRect().x;
	let mdo1YPos = mdo1.getBoundingClientRect().y;			
	let mdo1Width = 64; //mdo1.getBoundingClientRect().width;
	let mdo1Height = 64; //mdo1.getBoundingClientRect().height;			

	let mdo2XPos = mdo2.getBoundingClientRect().x;
	let mdo2YPos = mdo2.getBoundingClientRect().y;			
	let mdo2Width = 64; //mdo2.getBoundingClientRect().width;
	let mdo2Height = 64; //mdo2.getBoundingClientRect().height;		

	let iOffsetXPosAsPixel=10;
	let iOffsetYPosAsPixel=10;	
	
	let iStepX=10;
	let iStepY=10;	

/*	
	alert("mdo1XPos: "+mdo1XPos+"; "+"mdo1Width: "+mdo1Width);	
	alert("mdo2XPos: "+mdo2XPos+"; "+"mdo2Width: "+mdo2Width);
*/
	
	if ((mdo2YPos+mdo2Height < mdo1YPos+iOffsetYPosAsPixel-iStepY) || //is the bottom of mdo2 above the top of mdo1?
		(mdo2YPos > mdo1YPos+mdo1Height-iOffsetYPosAsPixel+iStepY) || //is the top of mdo2 below the bottom of mdo1?
		(mdo2XPos+mdo2Width < mdo1XPos+iOffsetXPosAsPixel-iStepX) || //is the right of mdo2 to the left of mdo1?
		(mdo2XPos > mdo1XPos+mdo1Width-iOffsetXPosAsPixel+iStepX)) //is the left of mdo2 to the right of mdo1?
	{		
		//no collision
		return false;
	}
	
	return true;
}



//every 5secs
//setInterval(myUpdateFunction, 5000);
//edited by Mike, 20220822; increase world's repaint speed;
//add: delay in object's repaint speed
//setInterval(myUpdateFunction, 100); //200); //1/5 of second

//remembered: from https://www.youtube.com/watch?v=SxAFLXSeMjI; last accessed: 20220827; keyphrase: 桜井政博のゲーム作るには, フレームはコマ数

//added by Mike, 20220904
//notes: executes faster than onLoad() before init of positions, et cetera
//removed by Mike, 20220904
/*setInterval(myUpdateFunction, 16.66); //1000/60=16.66; 60 frames per second
*/

//setInterval(myUpdateFunction, 33.33); //1000/30=33.33; 30 frames per second
//output: via Android Samsung Duos, noticeable delay in frame update

//setInterval(myUpdateFunction, 100); //1/5/2 of second
//setInterval(myUpdateFunction, 50); //200); //1/5 of second

//verified: internet connectivity to successfully load page;
//OUTPUT: 60 frames per second execution appears to be CORRECT

//TO-DO: -verify: setting image tile to be smaller than 64x64px
//reference: https://invertedhat.itch.io/postie; last accessed: 20220825;
//however, NOT as RUN&JUMP ACTION GAME; 
//where: OUTPUT via CONTROLS noticeably INCORRECT 
//to cause multiple attempts to execute correct JUMP to platform;

//reference: https://stackoverflow.com/questions/15466802/how-can-i-auto-hide-alert-box-after-it-showing-it; last accessed: 20220911
//answer by: Travis J, 20130317T2213
function tempAlert(msg,duration)
{
 var el = document.createElement("div");
  
  //edited by Mike, 20220911 //el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;");

  el.setAttribute("style","position:absolute;top:0%;left:0%;background-color:white;");
  el.innerHTML = msg;
   
  setTimeout(function(){
    el.parentNode.removeChild(el);
 	  
	//added by Mike, 20220914
	//--------------------------------------------
	iHorizontalOffset=(screen.width)/2-iStageMaxWidth/2;
	
	//alert("screen.width: "+screen.width); //landscape:533; potrait: 320
	//alert("iStageMaxWidth: "+iStageMaxWidth); //landscape:320; potrait: 320

	var executeLink = document.getElementById("executeLinkId");
	var iExecuteLinkHeight = (executeLink.clientHeight);//+1; + "px";
	var iExecuteLinkWidth = (executeLink.clientWidth);//+1; + "px"

	executeLink.style.left = 0+iHorizontalOffset+iStageMaxWidth/2 -iExecuteLinkWidth/2 +"px";
	executeLink.style.top = 0+iStageMaxHeight/2 +"px"; 
	
	//notes: noticeable delay in CHANGE in position via repaint setting, et cetera	
	myUpdateFunction();
	//--------------------------------------------
	
  },duration);
  
  document.body.appendChild(el);
}

//added by Mike, 20220822
function onLoad() {
	//added by Mike, 20220824	
	//reference: https://stackoverflow.com/questions/70415416/how-hide-address-bar-in-mobile-using-javascript-or-css; last accessed: 20220824;
	//answer by: JS_basic_knowledge, 20211219T2149	
/*
	//reverified: this; "Hide the address bar"
    window.scrollTo(0, 100); //100px for address bar

	//note: incorrect output	
//	document.documentElement.requestFullScreen();  
//	document.documentElement.mozRequestFullScreen();  
*/		

	//added by Mike, 20220910
	//reference: https://stackoverflow.com/questions/6666907/how-to-detect-a-mobile-device-with-javascript; last accessed: 20220910
	//answer by: Baraa, 20141026T2059
	if (/Mobile|Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
		alert("detected: Mobile Browser!");
	}
	
/* //removed by Mike, 20220911	
	//added by Mike, 20220910; edited by Mike, 20220911	
	var myBody = document.getElementById("myBodyId");

	//reference: https://stackoverflow.com/questions/4917664/detect-viewport-orientation-if-orientation-is-portrait-display-alert-message-ad; last accessed: 20220910
	//answer by: crmpicco, 20130515T1414;
	//edited by: posit labs, 20150929T1708
	if (window.matchMedia("(orientation: portrait)").matches) {
	   alert("detected: PORTRAIT mode");
	   myBody.className='bodyPortraitMode';
	}

	if (window.matchMedia("(orientation: landscape)").matches) {
	   alert("detected: LANDSCAPE mode");	   	   
	   myBody.className='bodyLandscapeMode';
	}	
*/	

	//reference: https://stackoverflow.com/questions/4917664/detect-viewport-orientation-if-orientation-is-portrait-display-alert-message-ad; last accessed: 20220910
	//answer by: Jatin, 20120731T0711;
	//edited by Tisho, 20120731T0730
	//add: listener to detect orientation change
	window.addEventListener("orientationchange", function() {
	  //orientation number (in degrees) : 90 and -90 for landscape; 0 for portrait
	  //edited by Mike, 20220911
	  //alert(window.orientation);
			
		//added by Mike, 20220910; edited by Mike, 20220911	
		var myBody = document.getElementById("myBodyId");

		//reference: https://stackoverflow.com/questions/4917664/detect-viewport-orientation-if-orientation-is-portrait-display-alert-message-ad; last accessed: 20220910
		//answer by: crmpicco, 20130515T1414;
		//edited by: posit labs, 20150929T1708
		//if ((window.orientation==0) ||
/*		
		if ((screen.orientation==0) ||
			(window.matchMedia("(orientation: portrait)").matches)) {
*/				
		if (screen.orientation==0) {
		  //alert("detected: PORTRAIT mode");
		   myBody.className='bodyPortraitMode';
		}
		else {//if (window.matchMedia("(orientation: landscape)").matches) {
		   //alert("detected: LANDSCAPE mode");	   	   
		   myBody.className='bodyLandscapeMode';
		}			  

		//tempAlert("close",1000);　//1sec
		//edited by Mike, 20220914
		//tempAlert("",1000);　//1sec
		tempAlert("",200);　//1/5sec		
				
		//TO-DO: -add: auto-update: object positions after CHANGE in orientation 
	}, false);

	//added by Mike, 20220904	
	//TO-DO: -add: init; where: set initial positions, et cetera
	var imgIpisTileNumber2 = document.getElementById("ipisTileImageIdNumber2");
	imgIpisTileNumber2.style.left = screen.width/2 +"px"; //"100px";
	imgIpisTileNumber2.style.top = "0px"; //"100px";
	
	//added by Mike, 20220911
	//TO-DO: -update: computer instructions to reuse containers, e.g. stage width
	var imgIpisTile = document.getElementById("ipisTileImageId");
	imgIpisTile.style.left = screen.width/2 +"px"; //"100px";
	//edited by Mike, 20220911
	imgIpisTile.style.top = screen.height/4 +"px"; //screen.height/2 +"px"; //"100px";
	
		
	//added by Mike, 20220909
	//https://www.w3schools.com/js/js_arrays.asp; last accessed: 20220823
	//https://www.w3schools.com/js/js_loop_for.asp; last accessed: 20220909	
	arrayTileBg = [];
	for (let iTileBgCount=0; iTileBgCount<4; iTileBgCount++) {
		//var imgIpisTileNumber2 = document.getElementById("ipisTileImageIdNumber"+iCount);
		arrayTileBg[iTileBgCount] = document.getElementById("ipisTileImageIdBg"+iTileBgCount);
		//edited by Mike, 20220911
		arrayTileBg[iTileBgCount].style.left = iTileBgCount*64+"px";						
		//arrayTileBg[iTileBgCount].style.left = (screen.width/2-iTileBgCount*64*2)+iTileBgCount*64+"px";

		arrayTileBg[iTileBgCount].style.left = screen.width/2+"px";
		
		//arrayTileBg[iTileBgCount].style.top =  iStageMaxHeight+"px";		
		arrayTileBg[iTileBgCount].style.top =  0+"px";		

	}
	
	//added by Mike, 20220912	
	var executeLink = document.getElementById("executeLinkId");

	var iExecuteLinkHeight = (executeLink.clientHeight);//+1; + "px";
	var iExecuteLinkWidth = (executeLink.clientWidth);//+1; + "px"

//alert (iExecuteLinkWidth);

//	executeLink.style.left = 0+iHorizontalOffset+(iStageMaxWidth-iHorizontalOffset)/2 +"px"; //iStageMaxWidth

//	executeLink.style.left = 0+iHorizontalOffset+(iStageMaxWidth-iHorizontalOffset)/2 +(iExecuteLinkWidth/2)+"px"; //iStageMaxWidth

	//edited by Mike, 20220913
//	executeLink.style.left = 0+iHorizontalOffset+(iStageMaxWidth-iHorizontalOffset)/2 +(iExecuteLinkWidth/2)+"px"; //iStageMaxWidth

//	executeLink.style.left = 0+iHorizontalOffset+(iStageMaxWidth-iHorizontalOffset)/2 +"px"; //iStageMaxWidth
	//edited by Mike, 20220914
	//TO-DO: -update: position based on mobile (portrait or landscape) and non-mobile
//	executeLink.style.left = 0+iHorizontalOffset+(iStageMaxWidth-iHorizontalOffset)/2 +(iExecuteLinkWidth)+"px"; //iStageMaxWidth
	//edited by Mike, 20220914
//	executeLink.style.left = 0+iHorizontalOffset+(iStageMaxWidth-iHorizontalOffset)/2 +"px"; //iStageMaxWidth

	executeLink.style.left = 0+iHorizontalOffset+iStageMaxWidth/2 -iExecuteLinkWidth/2 +"px";
	executeLink.style.top = 0+iStageMaxHeight/2 +"px"; 
	

/*	
			mdo2.style.left = iStageMaxWidth+"px";				
			mdo2.style.top =  iStageMaxHeight+"px";
*/

	//note: smaller screen width x height for game canvas;
	//as with Legend of Zelda Game&Watch; landscape view
	//IF identified to be mobile,
	//remaining space, for touch button inputs;
	//IF keyboard inputs: W, S, A, D, et cetera

	document.body.onkeydown = function(e){
	//alert("e.keyCode: "+e.keyCode);
		
/* //removed by Mike, 20220823		
		var imgIpisTile = document.getElementById("ipisTileImageId");

		//added by Mike, 20220821; OK
		//note: myUpdateFunction() executes only 
		//when Web Browser is set to be FOCUSED;
		let imgIpisTileX = imgIpisTile.getBoundingClientRect().x;
		//added by Mike, 20220822
		let imgIpisTileY = imgIpisTile.getBoundingClientRect().y;
			
		let iStepX=4;
		let iStepY=4;
*/
		//note: simultaneous keypresses now OK;
				
		//OK; //note: unicode keycode, where: key d : 100?
		//note: auto-accepts keyhold; however, with noticeable delay 
		//solved: via bKeyDownRight = false; et cetera
		if (e.keyCode==68) { //key d
	//			alert("dito");
			//imgIpisTile.style.left =  imgIpisTileX+iStepX+"px";				
			//edited by Mike, 20220823
			//bKeyDownRight=true;
			arrayKeyPressed[iKEY_D]=true;			
		}
		else if (e.keyCode==65) { //key a			
			//edited by Mike, 20220823
			//imgIpisTile.style.left =  imgIpisTileX-iStepX+"px";				
			arrayKeyPressed[iKEY_A]=true;			
		}
		
		//added by Mike, 20220822
		if (e.keyCode==87) { //key w		
			//edited by Mike, 20220823
			//imgIpisTile.style.top =  imgIpisTileY-iStepY+"px";				
			arrayKeyPressed[iKEY_W]=true;			
		}
		else if (e.keyCode==83) { //key s
			//edited by Mike, 20220823
			//imgIpisTile.style.top =  imgIpisTileY+iStepY+"px";				
			arrayKeyPressed[iKEY_S]=true;			
		}
	}
	
	//added by Mike, 20220822
	document.body.onkeyup = function(e){
		//alert("KEYUP; e.keyCode: "+e.keyCode);
		if (e.keyCode==68) { //key d
			//edited by Mike, 20220823
			//bKeyDownRight=false;
			arrayKeyPressed[iKEY_D]=false;			
		}
		else if (e.keyCode==65) { //key a			
			arrayKeyPressed[iKEY_A]=false;			
		}

		//added by Mike, 20220823
		if (e.keyCode==87) { //key w			
			arrayKeyPressed[iKEY_W]=false;			
		}
		else if (e.keyCode==83) { //key s			
			arrayKeyPressed[iKEY_S]=false;			
		}

	}	
	
	
	//added by Mike, 20220904
	setInterval(myUpdateFunction, 16.66); //1000/60=16.66; 60 frames per second
	
}		


		//SVGH
		function copyText(iCount){
//			alert("hello"+iCount);
	 
			//Reference: https://stackoverflow.com/questions/51625169/click-on-text-to-copy-a-link-to-the-clipboard;
			//last accessed: 20200307
			//answer by: colxi on 20180801; edited by: Lord Nazo on 20180801	 
/*	 
			var holdText = document.getElementById("patientNameId"+iCount).innerText;

			const el = document.createElement('textarea');
		    el.value = holdText;
			document.body.appendChild(el);
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);

			//alert("text: "+holdText);
*/
			var sHoldTextPatientName = document.getElementById("patientNameId"+iCount).innerText;
			var sHoldTextFee = document.getElementById("feeId"+iCount).innerText; //.innerText;

//			alert("sHoldTextPatientName: "+sHoldTextPatientName);
//			alert("sHoldTextFee: "+sHoldTextFee);

			var sHoldTextTransactionTypeName = document.getElementById("transactionTypeNameId"+iCount).innerText;

			var sTreatmentTypeName = document.getElementById("treatmentTypeNameId"+iCount).innerText;

			var sDiscountAmount = "";
			var sTotalAmount = "0";
			
			if (sHoldTextTransactionTypeName=="CASH") {
				//alert("CASH!");
				sTotalAmount = sHoldTextFee;
			}
			else if (sHoldTextTransactionTypeName=="SC/PWD") {
				//note: solve the values of the other variables using one (1) known variable value
				sTotalAmount = sHoldTextFee
				sHoldTextFee = -sHoldTextFee/(0.20-1);
				sDiscountAmount = "" + sHoldTextFee*0.20;
			}
			else if (sHoldTextTransactionTypeName=="NC") {
				sHoldTextFee = "NC";				
				sTotalAmount = "NC";				
			}						
			else { //hmo
				sHoldTextFee = "HMO";				
				sTotalAmount = sHoldTextTransactionTypeName.toLowerCase();				
			}
			
			const el = document.createElement('textarea');
/*		    
			el.value = sHoldTextPatientName+ "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			document.body.appendChild(el);
*/			

			sTreatmentTypeName = sTreatmentTypeName.toUpperCase();
			
			if ((sTreatmentTypeName=="SWT") || (sTreatmentTypeName=="SHOCKWAVE")) {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" +sHoldTextFee + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="LASER") {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" +sHoldTextFee + "\t" + "\t" + sDiscountAmount + "\t" + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="OT") {
				el.value = sHoldTextPatientName + "\t" + "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else if (sTreatmentTypeName=="IN-PT") {
				el.value = sHoldTextPatientName + "\t" + "\t" + "\t" + "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			else {
				el.value = sHoldTextPatientName+ "\t" + sHoldTextFee + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + "\t" + sDiscountAmount + "\t" + sTotalAmount;
			}
			
			document.body.appendChild(el);							
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);

//			alert("text: "+sHoldTextPatientName + sHoldTextFee);//el.value);

		}
/*	  
		  defaultScrollWidth = 0;
		  
		  function auto_grow(element) {
			element.style.height = "5px";
			element.style.height = (element.scrollHeight*4)+"px";

			if (defaultScrollWidth == 0) {
				defaultScrollWidth = element.scrollWidth; //i.e. 42% of the width of the full width of the Browser Window
				alert("defaultScrollWidth: "+defaultScrollWidth);
			}
			else if (element.scrollWidth < defaultScrollWidth){
//				defaultScrollWidth = 100%;
				defaultScrollWidth = element.scrollWidth;
//				alert("defaultScrollWidth: "+defaultScrollWidth);

			}
				
			element.style.width = defaultScrollWidth; //(element.scrollWidth+element.scrollWidth*0.42)+"px";			
		  }
*/

		function copyTextMOSC(iCount){
//			alert("hello"+iCount);
	 
			//Reference: https://stackoverflow.com/questions/51625169/click-on-text-to-copy-a-link-to-the-clipboard;
			//last accessed: 20200307
			//answer by: colxi on 20180801; edited by: Lord Nazo on 20180801	 

			var sHoldTextPatientName = document.getElementById("patientNameId"+iCount).innerText;
			
			const el = document.createElement('textarea');

			el.value = sHoldTextPatientName;
			
			document.body.appendChild(el);							
			el.select();
			document.execCommand('copy');
			document.body.removeChild(el);

//			alert("text: "+sHoldTextPatientName + sHoldTextFee);//el.value);

		}


		//added by Mike, 20220415				
		function myPopupFunction(iButtonId) {			
			//TO-DO: -update: this
			//+iCount
			var iMyCurrentChargeCount = document.getElementById("myCurrentChargeCountId").value; //innerText
			
			//do the following omyUpdateFunctionnly if value is a Number, i.e. not NaN
			if (!isNaN(iMyCurrentChargeCount)) {		
				//alert(iMyCurrentChargeCount);
				
				//auto-verify IF charge count sufficient to execute ACTION, e.g. PUNCH
				//added by Mike, 20220416
				//note: @present, max action COST = 1
				
				if ( (iButtonId!=0) && (iButtonId!=1)){ //CHARGE Button OR GUARD Button
					if (iMyCurrentChargeCount<=0) {
/* //edited by Mike, 20220417						
						alert("INSUFFICIENT CHARGE!");

//						document.getElementById("iButtonId2").focus=false; 				
						
						//reference:					
						//https://stackoverflow.com/questions/15897434/javascript-refresh-parent-page-without-entirely-reloading
						//answer by: decden, 20130419T0858
						//edited by: CommunityBot, 20170523T1159
						window.location = window.location;
*/
						//TO-DO: -add: IF player count >= 2
						document.getElementById("spanMyCurrentChargeCountP1Id").style="color:red"; 	
						
						//TO-DO: -add: rest of button ID's
						//edited by Mike, 20220417
//						document.getElementById("iButtonId2").blur(); 				
						//document.getElementById("iButtonId"+2).blur(); 	
						document.getElementById("iButtonId"+iButtonId).blur(); 	
 										
						return;
					}
				}				
			}
		
/* //removed by Mike, 20210902
			//added by Mike, 20210424
			//note: we add this command to prevent multiple button clicks
			//received by computer server before identifying that a patient transaction
			//already exists in Cart List from Database
			document.getElementById("addButtonId").disabled = true;
*/
			window.location.href = "<?php echo site_url('canvas/confirm/"+iButtonId+"');?>";
	
			//added by Mike, 20210424
			//note: no need to add this due to computer enables button after reloading page
//			document.getElementById("addButtonId").disabled = false;
//			setTimeout(setButton("addButtonId",false),300000);
		}			
	  </script>
  <!-- edited by Mike, 20220822 -->

  <body id="myBodyId" onload="onLoad();">
<!-- removed by Mike, 20220911 
    <table class="imageTable">
	  <tr>
		<td class="imageColumn">				
			<img id="usbongLogoId" class="Image-companyLogo" src="<?php echo base_url('assets/images/usbongLogo.png');?>">	
		</td>
		<td class="pageNameColumn">
			<h2>
				囲碁 STAGE
			</h2>		
		</td>
	  </tr>
	</table>
-->

<canvas id="myCanvasId" class="myCanvas">
</canvas>

<!-- removed by Mike, 20220911
<br/>
<br/>
-->

<!--
//reference: https://stackoverflow.com/questions/9454125/javascript-request-fullscreen-is-unreliable;
//last accessed: 20220825
//answer by: Sally Hammel, 20120409T1402
//edited by: BenMorel, 20131209T1511
-->
<!-- href="/flashStage"; href="#" //Full Screen Mode -->
<a id="executeLinkId" class="executeLink" onClick="toggleFullScreen()"><u>EXECUTE</u></a>


	<input type="hidden" id="myCurrentChargeCountId" 
		value="<?php //TO-DO: -update: this to have >= 2 Players
				if (isset($iMyCurrentChargeCountP1)) {		
					echo $iMyCurrentChargeCountP1; //1
				}
				else {
					echo 0;							
				}?>" 
	required>
<!--	//removed by Mike, 20220911
		<audio id="myAudioId" width="416" height="312" controls loop>
		  <source src="assets/audio/Tinig 112.m4a" type="audio/x-m4a">
		  Your browser does not support the audio tag.
		</audio><br/>	
-->		
	<?php	
		//added by Mike, 20220416
		if (!isset($iMyCurrentChargeCountP1)) {
			$iMyCurrentChargeCountP1=0;
		}
		
/* //edited by Mike, 20220417		
		echo "PLAYER1 CHARGE COUNT: ".$iMyCurrentChargeCountP1."<br/>";
		echo "PLAYER2 CHARGE COUNT: "."0"."<br/>"; //$myCurrentChargeCountP2
*/

/* //removed by Mike, 20220909
		echo "PLAYER1 CHARGE COUNT: <span id='spanMyCurrentChargeCountP1Id'>".$iMyCurrentChargeCountP1."</span><br/>";
		echo "PLAYER2 CHARGE COUNT: <span id='spanMyCurrentChargeCountP2Id'>"."0"."</span><br/>"; //$myCurrentChargeCountP2
*/
		
	//removed by Mike, 20220424	
//		echo "<br/>";
		
/* //edited by Mike, 20220416		
//		echo "PLAYER1 INPUT: ".$data['inputParam']."<br/>";
		echo "PLAYER1 INPUT: ".$sInputAsButtonText0."<br/>";
		//edited by Mike, 20220415
//		echo "PLAYER2 INPUT: CHARGE<br/>";	
		echo "PLAYER2 INPUT: ".$sInputAsButtonText1."<br/>";
*/

/*	//removed by Mike, 20220424
		echo "PLAYER1 ACTION: ".$sInputAsButtonText0."<br/>";
		echo "PLAYER2 ACTION: ".$sInputAsButtonText1."<br/>";
		
		echo "<br/>";
*/		

/* //removed by Mike, 20220909
		switch($iHitPlayerId) {
			case 1: //PLAYER1
				echo "HITS PLAYER 1!";
				break;
			case 2: //PLAYER2
				echo "HITS PLAYER 2!";
				break;
			case -1: //NO HIT
				echo "NO PLAYER HIT!";
				break;
		}
*/				
	?>

	<?php	
		$chargeButtonId=0;
		$defendGuardButtonId=1;
		$attackPunchButtonId=2;
		$attackSpecialButtonId=3;
		$attackThrowButtonId=4;
		$defendReflectButtonId=5;
	?>


<!-- TO-DO: -add: auto-identify position in BOARD;
	example: corners, top, bottom, left, right sides, center
-->			

<?php 
	//edited by Mike, 20220904; edited again by Mike, 20220911
	$iRowCountMax=2; //9
	$iColumnCountMax=2; //9	

//4=2*2
$iTileBgCountMax=$iRowCountMax*$iColumnCountMax;

for ($iCount=0; $iCount<$iTileBgCountMax; $iCount++) {
?>	
	<img id="ipisTileImageIdBg<?php echo $iCount;?>" class="Image64x64TileBackground" src="<?php echo base_url('assets/images/ipis.png');?>">

<?php
}
?>

	<!-- added by Mike, 20220820; 
		 reference: https://www.w3schools.com/cssref/pr_pos_clip.asp; last accessed: 20220820
		 //Image64x64Tile
	-->
	<img id="ipisTileImageId" class="Image64x64TileFrame1" src="<?php echo base_url('assets/images/ipis.png');?>">	
		
<!-- added by Mike, 20220904 -->

	<img id="ipisTileImageIdNumber2" class="Image64x64TileFrame1" src="<?php echo base_url('assets/images/ipis.png');?>">	

<!-- removed by Mike, 20220911
	<br />
	<div class="copyright">
		<span>© <b>www.usbong.ph</b> 2011~<?php echo date("Y");?>. All rights reserved.</span>
	</div>		 
-->	
	<audio id="myAudioId" class="myAudio" controls loop>
	  <source src="assets/audio/Tinig 112.m4a" type="audio/x-m4a">
	  Your browser does not support the audio tag.
	</audio><br/>	
  </body>
</html>
