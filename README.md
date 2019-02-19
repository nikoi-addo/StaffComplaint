January 20
--start--
Sought to add the Delete Functionality, snag stands with implementing a modal because current css design does not work well with the bootstrap Modal, might end up deleting directly without a prompt as it stands now.
Delete functionality work is aimed at moving the comment specifically from the complaint table to another table all together; deletedcomplaint
In addition, working on the comment section within the hr.php file
Finally make the time as 24 Hours

--end--


Changed the time to reflect the 24hour format in both hr.php and index.php files primarily with the complaint. The comments retained the am and pm module
Deletion Functionality complete with the issue of confirmation of delete put a tooltip to inform user that deletion is irreversable.
Database has an extra table del_complaints to hold the info of the deleted columns. In addition the status row in the complaints table has been removed for now. Inactive posts can be fetched without specifying active or inactive by using the c_date_stop_display
The image upload too has been modified to ensure that the spaces that do not have images do not  show any broken image view. If they do appear then it means an image was uploaded on one end and did not reflect on the other side.
The comment function too has been completed and I think that if there need be any aesthetic designs you can implement those ones too.
In addition find the new database file attached also.
----signed Mingle

25 January

1.Made front end changes to delete and send button on the hr.php
2.Added new page message.php to display messages from hr when posted.

26 January
Backend to display posts from compaints table in database to actposts.php and inactposts.php and the del_complaints table to the delposts.php pages.
There is need however to check on the exact info to refelect in these cases.
NB: Commit messages should be short but capture majority of changes made.
----signed mingle

27 January
Worked to Check if comment has been replied or not.
Updated the admin.php page too.
Added a new table in the Database so you have need to import the new database
--signed Mingle

13 February
1. Created imcomplete table for HR message (messagehr)
2. Add more input to hr.php
3. Changed style of hr reply and delete buttons
4. Exported new database for you to import
5. New code for hr message is inside handlers folder
--signed Maestro

18 February
Worked on the handlers.php file to include the multiple file uploads.
Created a new table that hosts the names of the images and a reference to show from which of the activities it is from(message or complaint)
Took out the image_name from the complaint and the message tables also.
In addition for the code for the multiple images I changed the input element by introducing the multiple attribute and adding one extra array for the file name also.
In the rendering of the images for the hr and index and also the images, I have put in the select statement to pick from the image database called "imaginary".
Had problems with the commment upload though and can't seem to find the head and tail fo that one so I think you can check on that.
