January 20
--start--
Sought to add the Delete Functionality, snag stands with implementing a modal because current css design does not work well with the bootstrap Modal, might end up deleting directly without a prompt as it stands now.
Delete functionality work is aimed at moving the comment specifically from the complaint table to another table all together; deletedcomplaint
In addition, working on the comment section within the hr.php file
Finally make the time as 24 Hours

--end--

----signed Mingle
Changed the time to reflect the 24hour format in both hr.php and index.php files primarily with the complaint. The comments retained the am and pm module
Deletion Functionality complete with the issue of confirmation of delete put a tooltip to inform user that deletion is irreversable.
Database has an extra table del_complaints to hold the info of the deleted columns. In addition the status row in the complaints table has been removed for now. Inactive posts can be fetched without specifying active or inactive by using the c_date_stop_display
The image upload too has been modified to ensure that the spaces that do not have images do not  show any broken image view. If they do appear then it means an image was uploaded on one end and did not reflect on the other side.
The comment function too has been completed and I think that if there need be any aesthetic designs you can implement those ones too.
In addition find the new database file attached also.

25 January

1.Made front end changes to delete and send button on the hr.php
2.Added new page message.php to display messages from hr when posted.
