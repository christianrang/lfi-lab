<?php

echo "
<div class='lecture'>
 <h1>Something is not right with this page...</h1>

<p>
  URLs are the most consistent way a user provides input to a webserver. 
  If inputs from users are not carefully guarded it can lead to various types of vulnerabilities. 
  In this case directly manipulating the URL allows an attack called Local File Inclusion or LFI.
  This allows an attacker to see files stored locally on the webserver.
</p>

<h2>Why is this dangerous?</h2>

<p>
LFI allows an attacker to read files on the victim machine.
This is limited by the permissions of the user running the server. 
In Linux, the user is normally www-data, but could be anyone, even root!
</p>

<p>
If an attacker is able to get a malicious executable on to the victim machine, they can sometimes use LFI to execute the file.
This combo is useful in gaining remote code execution and popping reverse shells.
</p>

<h2>How to find LFI</h2>

<p>
In the URL for this page you will notice the below parameter being passed.
<pre>
  ?page=include.php
</pre>

The PHP code on the backend is taking this parameter and using it to search for another file to display to the user. 
If you look in the php directory of this project you can see the file being included 'include.php'.

You can also see the file be connecting to the victim machine by running
<pre>
  docker-compose exec -it lfi-lab bash
</pre>

Running this command will give you a shell on the victim machine, so you can gain insight to what a blue team or systems administrator might see.
Once on the machine the files for the webserver can be found in the /var/www/html/ directory.
Take the opportunity to change the files and see how they affect the outcome.
If you break something you can always reinstall the lab!
</p>

<p>
Back to the paramter.
<pre>
  ?page=include.php
</pre>
We have recognized 'include.php' as a file on the remote system. 
Both by the file extension and a little cheating and looking inside the system.
But how would we test this for LFI without cheating?
Change the 'include.php' for a path to another file we know exists on the system. Common examples of files on Linux can be found beneath the heading 'Examples of files to look for on Linux'.
</p>
<p> A common example of this would be to try <pre> ?page=/etc/passwd
</pre>
You can read more about /etc/passwd <a href='https://linuxize.com/post/etc-passwd-file/'>here</a>. This file stores information about the users on the machine, including their home directory, startup shell, and UID/GUID.
With the ability to read the file we can even find a comment left by the user in the /etc/passwd file!
</p>

<h2>Examples of files to look for on Linux</h2>

Follow the links and look at how the URL changes!

<ul>
 <li><a href='http://localhost:3000/?page=/etc/passwd'>/etc/passwd</a></li>
 <li><a href='http://localhost:3000/?page=/proc/version'>/proc/version</a></li>
 <li><a href='http://localhost:3000/?page=/etc/issue'>/etc/issue</a></li>
 <li><a href='http://localhost:3000/?page=/etc/profile'>/etc/profile</a></li>
 <li>/var/spool/crontabs/root</li>
 <li>/var/mail/root</li>
 <li>/root/.bash_history</li>
 <li>/var/log/dmessage</li>
</ul>

<h2>Other tips and tricks</h2>

<p>
Having a difficult time reading the file you included because of how the lines wrap? Right click on the page and select 'View page source' (or use the Chrome shortcut CTRL+U).
</p>

<h2>References:</h2>
These great references helped me to write this and are worth a read for a deeper dive into LFI and other closely related attacks!
<ul>
 <li><a href='https://www.offensive-security.com/metasploit-unleashed/file-inclusion-vulnerabilities/'>Offensive Security - FILE INCLUSION VULNERABILITIES</a></li>
 <li><a href='https://brightsec.com/blog/file-inclusion-vulnerabilities/'>File Inclusion Vulnerabilities: What are they and how do they work?</a></li>
 <li><a href='https://owasp.org/www-project-web-security-testing-guide/v41/4-Web_Application_Security_Testing/07-Input_Validation_Testing/11.1-Testing_for_Local_File_Inclusion#:~:text=Local%20file%20inclusion%20(also%20known,procedures%20implemented%20in%20the%20application.'>Testing for Local File Inclusion</a></li>
 <li><a href='https://book.hacktricks.xyz/pentesting-web/file-inclusion'>File Inclusion/Path traversal</a></li>
</ul>
</div>
"
?>
