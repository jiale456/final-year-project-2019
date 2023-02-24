<!--Session is a way to store information (in variables) to be used across multiple pages.-->

<!--To apply the session, always started with "session_start()" at the top of the document.-->

<!--Since there are several documents required to store information using the session, we create the "session_start()" in a separated document, and add it into other documents.-->

<!--In this case: documents that required to use the session:
    (i)login.php
    (ii)dashboard.php
    (iii)logout.php
-->
<?php
session_start();
?>