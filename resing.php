<?php


if (isset($_POST['resing'])) {

  // This is Code Rand
  $rand = 'q1w2e3r4t5y6u7i8o9p0a1s2d4f5g6h7j8k9l0z1x3c4v5b6n7m808';
  // This is Short Code
  $rand2 = substr(str_shuffle($rand),0,5);


   // This is $_POST
   $url = $_POST['url'];

   //Othman Direcotry
   $othman = $_POST['othman'];

    // This is Path Folder Were Download
    $path = __DIR__.'/go/in/';

    //This is Path Folder And File
    $path2 = $path . basename($url);

    // This is Download File
    file_put_contents( $path2 , fopen($url, 'r'));
   // This is Rename File
    rename($path2,__DIR__."/go/in/$rand2.ipa");


  echo  exec($othman);

  sleep(4);

 echo "<br><br><br>";

  unlink(__DIR__."/go/in/$rand2.ipa");

  echo 'File Name ' .$rand2.'.ipa' .' Has Been Deleted';

   $plistc = __DIR__ ."/go/out/";


   $plistpkg = "

   				<!DOCTYPE plist PUBLIC \"-//Apple//DTD PLIST 1.0//EN\" \"http://www.apple.com/DTDs/PropertyList-1.0.dtd\">
   <plist version=\"1.0\">
   <dict>
   <!-- array of downloads. -->
   	<key>items</key>
   	<array>
   		<dict>
   			<!-- an array of assets to download -->
   				<key>assets</key>
   				<array>
   				<!-- software-package: the ipa to install. -->
   					<dict>
   						<!-- required. the asset kind. -->
   						<key>kind</key>
   						<string>software-package</string>
   						<!-- required. the URL of the file to download. -->
   						<key>url</key>
   						<string>XXXXXXXXXXXXXXXXXXXXXXXXXX/beta/go/out/$rand2.ipa</string>
   					</dict>
   					<!-- display-image: the icon to display during download .-->
   					<dict>
   						<key>kind</key>
   						<string>display-image</string>
   						<!-- optional. indicates if icon needs shine effect applied. -->
   						<key>needs-shine</key>
   						<true/>
   						<key>url</key>
   						<string>https://unlimstore.com/OSAPP/upload/WhatusigyqS/.png</string>
   					</dict>
   					<!-- full-size-image: the large 512x512 icon used by iTunes. -->
   					<dict>
   						<key>kind</key>
   						<string>full-size-image</string>
   						<key>needs-shine</key>
   						<true/>
   						<key>url</key>
   						<string>https://unlimstore.com/OSAPP/upload/WhatusigyqS/.png</string>
   					</dict>
   				</array>
   				<key>metadata</key>
   			<dict>
   				<key>bundle-identifier</key>
   				<string>com.WhatusigyqS.com</string>
   				<key>bundle-version</key>
   				<string>2.2.2.2</string>
   				<key>kind</key>
   				<string>software</string>
   				<key>title</key>
   				<string>UnlimStore</string>
   			</dict>
   		</dict>
   	</array>
   </dict>
   </plist>

   ";


  file_put_contents($plistc. "$rand2.plist","$plistpkg");

$acc = "itms-services://?action=download-manifest&url=XXXXXXXXXXXXXXXXXXXXXXXXXX";

$linkplist = "/beta/go/out/$rand2.plist";
echo "<h1>";

echo "<a href=\"$acc$linkplist\">". "Click To install</a>";

echo "</h1>";


}else{


echo 'Neah';


}

 ?>
