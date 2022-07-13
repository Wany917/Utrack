<?php
	require "../functions/functions.php";
?>
<?php include "formheader.php"?>
<div class="container-fluid mt-1">

    <div class="row header text-center form-group">
        <div class="col-lg-4 col-sm-3 col-0 "></div>
        <div class="col-lg-4 col-sm-6 col-12 commoncontainer">
            <?php
				if(!empty($_SESSION['errors'])){
					echo "<div class='errors mt-3'>";
                    foreach ($_SESSION['errors'] as $error){
                        echo "- $error<br>";
                    }
                    echo "</div>";
					unset($_SESSION['errors']);
				}
		    ?>

            <h2 class="mt-3">Sign Up</h2>

            <form action="../functions/newUser.php" method="POST" class="mt-3">

                <input type="text" name="username" class="form-control-md text-center formsbtns mt-4 px-5 py-1"
                    placeholder="Username" required="required"><br>
                <input type="email" name="email" class="form-control-md text-center mt-3 formsbtns px-5 py-1"
                    placeholder="Email" required="required"><br>
                <label>Birthday</label>
                <input type="date" name="birthday" class="form-control-md text-center mt-3 formsdate px-2 mx-2 py-1"
                    required="required"><br>
                <input type="password" name="password" class="form-control-md text-center mt-3 formsbtns px-5 py-1"
                    placeholder="Password" required="required"><br>
                <input type="password" name="passwordConfirm"
                    class="form-control-md text-center mt-3 formsbtns px-5 py-1" placeholder="Confirm Password"
                    required="required"><br>

                <a type="button" class="formsbtns py-1 px-3 my-3" data-bs-toggle="modal" data-bs-target="#modalCaptcha"
                    id="captchaVerif">Click To Complete The Captcha</a><br>
                    
                    Your Account Type
                <select name="accountType" class="form-control-md text-center mt-2 formsselect py-1">
                    <option value="Listener" class="form-control-md text-center">Listener</option>
                    <option value="Artist" class="form-control-md text-center">Artist</option>
                    <option value="Beatmaker" class="form-control-md text-center">Beatmaker</option>
                </select><br>

                <!-- Modal Captcha -->
                <div class="modal fade" id="modalCaptcha" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content captcha">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Click On The Squares To Change Their
                                    Color</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <h5 id="colorCompleteInfo"></h5>
                            <h5>Close PopUp when finished</h5>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-4 captchaSquare" id="cs1"></div>
                                    <div class="col-4 captchaSquare" id="cs2"></div>
                                    <div class="col-4 captchaSquare" id="cs3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4 captchaSquare" id="cs4"></div>
                                    <div class="col-4 captchaSquare" id="cs5"></div>
                                    <div class="col-4 captchaSquare" id="cs6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4 captchaSquare" id="cs7"></div>
                                    <div class="col-4 captchaSquare" id="cs8"></div>
                                    <div class="col-4 captchaSquare" id="cs9"></div>
                                </div>

                            </div>
                            <h5 id="completed"></h5>
                        </div>
                    </div>
                </div>
                <input type="checkbox" name="cgu" required="required" class="mt-3">
                <a type="button"class="formsbtns px-2" data-bs-toggle="modal" data-bs-target="#modalCGU">
                    Terms of use
                </a><br>

            <!-- Scrollable modal -->
            <div class="modal fade" id="modalCGU" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content captcha">
                <div class="modal-header">
                    <h5 class="modal-title">Terms of use</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        
<h4>INTRODUCTION</h4>
Thank you for choosing Utrack (“Utrack”, “we”, “us”, “our”). By signing up to or otherwise using the Utrack platform, app, service, websites, and software applications (together, the “Utrack Service” or “Service”), you are entering into a binding contract with Utrackio AB, a Swedish based company with Swedish registration number 559036-7016.
<br>
Your agreement with us includes these Terms of Use (“Terms of Use”), our Privacy Policy, and relevant supplemental terms that apply to your interaction with each specific Service (collectively the “Agreements”). Please read these documents carefully. You acknowledge that you have read, understood and accepted these Agreements and agree to be bound by them. If you don’t agree with (or cannot comply with) the Agreements that apply to the services with which you interact, then don’t access or use the Utrack Service.
<br>
In order to access and use the Utrack Service, you need to be at least 18 years old and have the power to enter a binding contract with us and not be prevented from doing so under any law. If you are under 18, you must be able to provide proof of your guardian’s consent. You also promise that the information you submit to us is true, accurate, and complete, and you agree to keep it that way at all times.
<br>
If you open an account on behalf of a company, organization, or other entity, then (a) "you" includes you and that entity, and (b) you represent and warrant that you are authorized to grant all permissions and licenses provided in the Agreements and bind the entity to the Agreements and that you agree to the Agreements on the entity's behalf.
<br><br>
<h4>DEFINITIONS</h4>
“Recordings” shall mean any and all audio recordings that you submit to Utrack by uploading through the Services.
<br>
“Stores” shall mean any and all, now known or future, digital Internet consumer stores (such as Spotify, Deezer, iTunes and Amazon etc.), and/or any other digital retailers of music which Utrack has, from time to time, entered into an agreement with.
<br>
“Metadata” shall mean the music metadata, the information embedded in an audio file that is used to identify the content. This includes, but is not limited to, track title, band or artist name, type of music, label and the year the track was released.
<br>
“Territory” shall mean the world or specified applicable territory.
<br><br>
<h4>GRANT OF RIGHTS</h4>
You grant us all necessary consents and rights, without limitation, to sell and make use of your recordings for digital downloads, interactive and non-interactive streaming, cloud services and streaming-on-demand services. This grant of rights does not, however, constitute a transfer of ownership.
<br>

By using our Services you grant us, during the Term and throughout the Territory,
<br>
The non-exclusive, worldwide license right to distribute, publicly perform, exhibit, broadcast, transmit and make your Recordings available on the Internet and without limitation, on all Stores and any other similar digital media for sale by downloading, interactive and non-interactive streaming, cloud services and streaming-on-demand or now known or hereinafter devised, similar means of making use of the Recordings.
<br>The right to sell, make sales promotion clips of, copy and otherwise, to the extent necessary under these Terms of Use, make use of and alter the Recordings and Metadata and other materials, by all means and media, of which you submit to Utrack, through any and all Stores now available and operational and also the right to sublicense or otherwise transfer such rights to the Stores.
<br>The non-exclusive right to use your name(s), photographs, likenesses, cover artwork, biographical and other information attributable to you, which you have submitted to Utrack.
<br>The right for Utrack to sublicense or otherwise transfer the above rights to any and all Stores.
<br>The right for Utrack to perform Metadata corrections (where necessary).
<br>The right for Utrack to synchronize and authorize others to synchronize your Recordings with visual images, to combine portions of your Recordings with still or moving images or as a live stream.
<br>The right to authorize third-party partners and/or licensees, which offer services permitting the creation, use, and exploitation of so-called “remixes” of your Recordings and so-called “user-generated content” embodying your Recordings, including, without limitation, Twitch, TikTok, Facebook, and Instagram.
<br>The above does not constitute a transfer of ownership to any of the material you have uploaded or submitted to Utrack.

<br>
Any and all rights granted to us above are granted on a royalty-free license basis. This includes the use of any Metadata, artwork, lyrics, and videos of/embodying the Recordings if you have submitted any.
<br><br>
 

<h4>YOUR UTRACK ACCOUNT</h4>
In order to access certain features of the Service, you must create and/or sign into a user account (“Utrack Account”) of your own. Creating an account is completely free. Use of another’s account is not permitted. When creating your Utrack Account, you must provide accurate and complete information.
<br>
You are solely responsible for the activity that occurs on your Utrack Account. You are also responsible for maintaining the security of your account password, as well as the passwords of any third-party services that you may have elected to link to your account.
<br>
Please review our fully transparent Privacy Policy for information regarding security, confidentiality, and what we do with the data you provide us.
<br>
We will always make a reasonable effort in ensuring that our Services are available. Should the Services be interrupted in any way, we will make a reasonable effort to correct the interruptions without delay. We are, however, not liable for any errors, delays, or interruptions that might occur.
<br><br>
<h4>YOUR MUSIC, MATERIALS AND INFORMATION</h4>
When you upload your Recordings through our Services, you are asked to submit Metadata as well as cover artwork for use on the Stores. You submit the Recordings, cover artwork and any other information and material (jointly “Material”) at your own expense and in formats required for use on the Stores.
<br>
You are fully responsible for everything you submit to us. If we find it unsuitable, we reserve the right to, in our sole discretion, remove the information and/or prevent you from using our Services and/or any or all Stores.
<br>
You submit the Recordings to us in a pre-agreed format and for a pre-agreed release date. The release date will be locked and you may not change it.
<br>
We will always do our best to perform the Services. Utrack is, however, not responsible for any third-party failures in distributing the Recordings or Materials, or removing the same or any failures by you to adhere to the instructions given for distribution of your Recordings.
<br><br>
<h4>PROHIBITED USE</h4>
You may not in any way use our Services for any unlawful purpose or for the following reasons.
<br>
In any way that is or has the purpose of being unlawful, infringing, or fraudulent.
For the purpose to harm or attempt to harm any other person in any way
You may not upload any Recordings or Materials which may.
<br>
Contain hateful, racist, or inflammatory material.
<br>Promote sexually explicit or violent material.
<br>Promote discrimination based on race, religion, nationality, disability, or sexual orientation.
<br>Promote, advocate or assist in any illegal activity.
<br>Threaten, harass, upset, or alarm any other person or invade their privacy.
<br>Impersonate any person.
<br>We also do not allow the uploading of the following type of Recordings.
<br>
<br>Covers of classical music
<br>Podcasts, Audio Books, and Radio shows
<br>Parodies and tributes
<br>Utrack reserves the right to, in its sole discretion, determine if a Recording or if you have breached the above or any other section of the Agreements. If we find that a breach has occurred, we take such and any action we deem appropriate. We might, but are not limited to, temporarily or permanently remove your account and any and all Recordings and/or material uploaded through our Services, withhold any royalties attributable as well as freeze your Account, without notifying you. Should your Account be frozen, you will be able to log in and access information about streams and royalties accrued, as well as make payouts, should you have reached the threshold of $10 USD.
<br><br>
<h4>THIRD PARTY APPLICATIONS</h4>
The Utrack Service may be integrated with third party applications, websites, and services (“Third Party Applications”) to make the Services available to you. These Third Party Applications may have their own terms and conditions and privacy policies and your use of these Third Party Applications will be governed by and subject to such terms and conditions and privacy policies. You understand and agree that Utrack does not endorse and is not responsible or liable for the behaviour, features, or content of any Third Party Application or for any transaction you may enter into with the provider of any such Third Party Applications.                                                   
<br><br>
<h4>YOUR USE OF THE Utrack SERVICE</h4>
The Utrack Service may be used and accessed solely for lawful purposes. You agree to abide by all applicable laws and regulations in connection with your use of the Service. You agree and warrant that you will not use the Utrack Service to transmit, distribute, route, provide connections to or store any material that infringes copyrighted works or otherwise violates or promotes the violation of the intellectual property rights of any third party. You also agree to not threaten, harass, abuse, slander, defame or otherwise violate the legal rights of any employee of Utrack. Utrack may remove your Recordings and terminate your Account if you are abusive or rude or provide false or intentionally misleading information to any Utrack employees or agents.
<br>
Your Utrack Account shall be used solely by you and may not be transferred or shared with any third party. You acknowledge that you are exclusively responsible for all usage or activity on your Utrack Account. You shall immediately notify Utrack of any breach of security or unauthorized use of your Utrack account. Any fraudulent, abusive, or otherwise illegal account activity, including manipulated streams, shall constitute a basis to terminate your account. You agree to indemnify Utrack against any liability and costs arising from such improper use of your Utrack Account.
<br><br>
<h4>YOUR LIABILITY AND WARRANTIES</h4>
You agree and warrant that you will not distribute, transmit or store any files or material that might infringe copyrighted works. You also agree that you will not promote violation of a third party’s intellectual property rights. If you do, you acknowledge that Utrack may at any time, and in its sole discretion, remove your Recordings, disable access to the Services without notifying you and withhold any royalties assignable to the Recordings that are an infringement of copyrighted work, violates third party rights, or is subject to forced activity.
<br>

You also agree that:
<br>
<br>You are not under any disability, restriction, or prohibition to enter into the Agreements and grant the rights under the Agreements.
<br>You are responsible for all the Recordings and other materials and information uploaded through the Services.
<br>You are the owner or legally represent the owner of the Recordings and the materials and you possess full power and authority to enter into and perform under the Agreements.
<br>You have not entered into any agreement which may conflict with the Agreements.
<br>You have obtained all applicable and relevant consents and rights from, but not limited to, any owners, artists, musicians, producers, other persons, and companies involved in the production of the Recordings.
<br>You have, in the case of a cover version (a recording of a song/lyric for which you are not the author or owner) obtained all relevant consents for such use, and be able to present this consent to us.
<br>The Recordings are original and do not contain any samples which have not been cleared or else infringe upon the right of any person or third party.
<br>You shall not commit any act which might damage the reputation of Utrack or might inhibit, restrict or interfere with the exploitations of the Recordings.
<br>If you’re not the artist/owner of the Recordings, you have a valid and presentable agreement with the Artist that grants you all the rights to enter into this Agreement.
<br>                   
Moreover, you agree not to:
<br>
<br>distribute, alter or modify any part or parts of the Service;
<br>circumvent any technology used by Utrack, its licensors, or any third party to protect the Service or any content on the Service;
<br>sell, rent, sublicense or lease any part of the Service;
<br>provide your password to any other person or use any other person’s username and password;
<br>“crawl” the Service or otherwise use any automated means (including bots, scrapers, and spiders) to collect information from Utrack and its Services;
<br>Include or introduce any malicious content such as malware, Trojan horses, spyware, cancelbots, or other viruses and malicious codes.
                           
<br>You also agree that you will comply with all of the other provisions of the Agreements, at all times during your use of the Service.

<br>You agree that Utrack may terminate your Utrack Account and withhold any royalties if you violate the Agreements or, if Utrack or any Store believes, in Utrack’s and that Store’s good faith discretion, that you are infringing the intellectual property rights of third parties and/or engaging in otherwise fraudulent or forced activity, including manipulated streaming.

<br>Moreover, you agree and warrant that you shall not, in any way, conduct in any forced activity or systematic listening and that if you do so, it may result in Utrack and/or a Store deleting and blocking your Utrack Account and removing any or all uploaded Recordings, without notifying you.

<br>You agree that you are solely responsible for (and that Utrack has no responsibility to you or to any third party for) any breach of your obligations under the Agreements and for the consequences (including any loss or damage which Utrack may suffer) of any such breach.

<br>You acknowledge again that Utrack may at any time, and in its sole discretion, remove your Recordings, disable access to the Services without notifying you and withhold any royalties assignable to the Recordings if you breach any of the above. Moreover, if you have uploaded any Recordings that infringe any intellectual property of another artist, Utrack may withhold any royalties assignable to the Recordings, and pay them out to the copyright owner.

                                                                       
<br><br>
<h4>INFRINGEMENT AND REPORTING OF CONTENT</h4>
Utrack respects the rights of intellectual property owners. If you believe that any content on the Service infringes your intellectual property rights or other rights, please contact customer support. If Utrack is notified by a copyright holder that any Content infringes a copyright, Utrack may in its sole discretion take actions without prior notification to the provider of that content. If the provider believes that the content is not infringing, the provider may submit a counter-notification to Utrack with a request to restore the removed content.
<br>
If you believe that any content infringes any other intellectual property rights or does not comply with these Terms of Use, please contact Customer Support.           
<br><br>
<h4>OUR RIGHTS</h4>
We reserve the right to amend, discontinue or terminate our Services under this Agreement, at any time.
<br>
We reserve the right to reject or remove any Recordings or Materials from the Stores and our Services, that you have uploaded through the Services. We also reserve the right to terminate your access to the Stores or Services without notice.
<br><br>
<h4>OUR INTELLECTUAL PROPERTY</h4>                            
The Utrack Service, including but not limited to, all related technology, data, tools, and design is the property of Utrack and its subsidiaries or its licensors. We grant you a limited, non-exclusive, revocable license to make use of the Utrack Service.
<br>
The Utrack trademarks, service marks, trade names, logos, domain names, and any other features of the Utrack brand are the sole property of Utrack and its subsidiaries. The Agreements do not grant you any rights to use any brand features and Utrack trademarks whether for commercial or non-commercial use.
<br>
 We value hearing from our users and are always interested in learning about ways we can improve the Service. If you choose to submit comments, ideas, or feedback, you agree that we are free to use them without any restriction or compensation to you.
 <br><br>
<h4>SERVICE LIMITATIONS AND MODIFICATIONS</h4>
Utrack will make reasonable efforts to keep the Utrack Service operational. However, certain technical difficulties or maintenance may, from time to time, result in temporary interruptions. Utrack reserves the right, periodically and at any time, to modify or discontinue, temporarily or permanently, functions and features of the Utrack Service, with or without notice, all without liability to you, except where prohibited by law, for any interruption, modification, or discontinuation of the Utrack Service or any function or feature thereof.
<br><br>
<h4>TERM AND TERMINATION</h4>
The terms of this Agreement shall commence and continue (the “Term”) unless terminated by either Party under the Agreements.
<br>
You may at any time terminate and cancel the Utrack Services by contacting Customer Support.
<br>
Utrack may terminate the Agreements or suspend your access to the Utrack Service at any time for any and no reason, including in the event of your actual or suspected unauthorized use of the Utrack Service and/or any content, or non-compliance with the Agreements. You may terminate your Utrack Account at any time by submitting a termination request to Customer Support.
<br>
Any sections of the Agreements that, either explicitly or by their nature, must remain in effect even after termination of the Agreements, shall survive termination.
<br><br>
<h4>WARRANTY AND DISCLAIMER</h4>
WE ENDEAVOUR TO PROVIDE THE BEST SERVICE WE CAN, BUT YOU UNDERSTAND AND AGREE THAT THE Utrack SERVICE IS PROVIDED “AS IS” AND “AS AVAILABLE”, WITHOUT EXPRESS OR IMPLIED WARRANTY OR CONDITION OF ANY KIND. YOU USE THE Utrack SERVICE AT YOUR OWN RISK. TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW, Utrack MAKES NO REPRESENTATIONS AND DISCLAIM ANY WARRANTIES OR CONDITIONS OF SATISFACTORY QUALITY, MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.
<br><br>
<h4>LIMITATION OF LIABILITY</h4>
YOU AGREE THAT, TO THE EXTENT PERMITTED BY APPLICABLE LAW, YOUR SOLE AND EXCLUSIVE REMEDY FOR ANY PROBLEMS OR DISSATISFACTION WITH THE Utrack SERVICE IS TO UNINSTALL ANY Utrack SOFTWARE AND TO STOP USING THE Utrack SERVICE.
<br>
TO THE FULLEST EXTENT PERMITTED BY LAW, IN NO EVENT WILL Utrack, ITS OFFICERS, SHAREHOLDERS, EMPLOYEES, AGENTS, DIRECTORS, SUBSIDIARIES, AFFILIATES, SUCCESSORS, ASSIGNS, SUPPLIERS, OR LICENSORS BE LIABLE FOR (1) ANY INDIRECT, SPECIAL, INCIDENTAL, PUNITIVE, EXEMPLARY, OR CONSEQUENTIAL DAMAGES; (2) ANY LOSS OF USE, DATA, BUSINESS, OR PROFITS (WHETHER DIRECT OR INDIRECT), IN ALL CASES ARISING OUT OF THE USE OR INABILITY TO USE THE Utrack SERVICE, REGARDLESS OF LEGAL THEORY, WITHOUT REGARD TO WHETHER Utrack HAS BEEN WARNED OF THE POSSIBILITY OF THOSE DAMAGES, AND EVEN IF A REMEDY FAILS OF ITS ESSENTIAL PURPOSE; OR (3) AGGREGATE LIABILITY FOR ALL CLAIMS RELATING TO THE Utrack SERVICE, THIRD PARTY APPLICATIONS, OR THIRD PARTY APPLICATION CONTENT MORE THAN $1,000 (one-thousand USD), TO THE EXTENT PERMISSIBLE BY APPLICABLE LAW.
<br>
YOU SHALL INDEMNIFY AND HOLD HARMLESS Utrack, ITS SUBSIDIARIES AND AFFILIATES (INCLUDING ANY DIRECTORS, MEMBERS, EMPLOYEES, MEMBERS AND OTHER REPRESENTATIVES) AND THE STORES FROM AND AGAINST ANY AND ALL CLAIMS, LOSSES, DAMAGES, LIABILITIES, COSTS AND EXPENSES INCLUDING, WITHOUT LIMITATION, LEGAL EXPENSES AND COUNSEL FEES, ARISING OUT OF ANY BREACH OR ALLEGED BREACH BY YOU OF THE ABOVE WARRANTIES AND REPRESENTATIONS AND/OR USE OF THE RECORDINGS OR MATERIALS AS PERMITTED HEREUNDER. 
<br><br>
<h4>ENTIRE AGREEMENT</h4>
Other than as stated in this section or as explicitly agreed upon in writing between you and Utrack, the Agreements constitute all the terms and conditions agreed upon between you and Utrack and supersede any prior agreements in relation to the subject matter of these Agreements, whether written or oral.
<br><br>
<h4>SEVERABILITY AND WAIVER</h4>
Unless as otherwise stated in the Agreements, should any provision of the Agreements be held invalid or unenforceable for any reason or to any extent, such invalidity or unenforceability shall not in any manner affect or render invalid or unenforceable the remaining provisions of the Agreements, and the application of that provision shall be enforced to the extent permitted by law. Any failure by Utrack to enforce the Agreements or any provision thereof shall not waive Utrack’s or the applicable third party beneficiary’s right to do so.
<br><br>
<h4>ASSIGNMENT</h4>
Utrack may assign the Agreements or any part of them, and Utrack may delegate any of its obligations under the Agreements. You may not assign the Agreements or any part of them, nor transfer or sub-license your rights under the Agreements, to any third party.
<br><br>
<h4>INDEMNIFICATION</h4>
To the fullest extent permitted by applicable law, you agree to indemnify and hold Utrack harmless from and against all damages, losses, and expenses of any kind (including reasonable attorney fees and costs) arising out of: (1) your breach of this Agreement; (2) any content submitted by you to the Service; (3) any activity in which you engage on or through the Utrack Service; and (4) your violation of any law or the rights of a third party.
<br><br>
<h4>FORCE MAJEURE</h4>
Utrack takes no liability or responsibility for failures in providing any of our Services, if they are caused by an event outside Utrack’s control. Force Majeure means an event beyond our control that prevents us from complying with any obligations under this Agreement. These events include, but are not limited to, fires, earthquakes, tidal waves, floods, war, hostilities, invasion, embargo, revolution, civil war, riot, strikes, lockouts, acts or threats of terrorism, commotion, failures of public or private telecommunication networks, third party force majeure and an epidemic.
<br>
Should an event of Force Majeure occur, Utrack will notify you as soon as reasonable and give an estimate when due fulfillment can be expected. You may cancel your Services with us if your Service is affected by Force Majeure.
<br><br>
<h4>JURISDICTION AND DISPUTE VENUE</h4>
The Agreements and our Services shall be governed by the laws of Sweden and any dispute regarding this Agreement shall be submitted to the exclusive jurisdiction of the District Court of Stockholm, Sweden, as first instance.
<br><br>
<h4>CHANGES TO THE AGREEMENTS</h4>
Occasionally we may, in our discretion, make changes to the Agreements. It is your responsibility to check for any changes made to the Agreements. When we make material changes to the Agreements, we might provide you with prominent notice as appropriate under the circumstances, e.g., by displaying a prominent notice within the Service or by sending you an email. In some cases, we might notify you in advance. Your continued use of the Service after the changes have been made will constitute your acceptance of the changes. Please therefore make sure you read any such notice carefully.







                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
            </div>

                <input type="submit" disabled="disabled" id="signUp"
                    class="form-control-md text-center mt-3 formsbtns px-4 py-1" value="Sign Up">
            </form>

            <input type="button" onclick="window.location.href='signIn.php'"
                class="form-control-md text-center mt-4 formsbtns px-3 py-1 mb-5" value="I Already Have An Account">

        </div>

        <div class="col-lg-4 col-sm-3 col-0"></div>

        <!-- Script Captcha -->
        <script src="captcha.js"></script>
    </div>
</div>
</body>

</html>