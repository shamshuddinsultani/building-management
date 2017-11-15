<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">

              <fieldset class="repeat">
                <legend class="medium">Noticeboard</legend>
                <div id="errors"><p style="font-weight: 300;position: relative;font-size: 16px;">If you are looking to buy/sell/rent or are looking for/offering services - please post on ApnaComplex Classified  for a larger reach.</p></div>
                <form action="uploads.php" method="post" enctype="multipart/form-data">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td><label for="subject" class="sub">Subject</label></td>
                          <td><input type="text" name="subject" class="inp" size="40"></td>
                        </tr>
                        <tr>
                          <td><label class="sub">Attachments,if any</label></td>
                          <td><input type="file" name="file"></td>
                          <td><button type="submit" name="submit" class="btn btn-primary upload">Uploadfile</button></td>
                        </tr>
                      </tbody>
                    </table>
                </form>
              </fieldset>
                    </div>
              
                <!-- /. ROW  -->
	<?php include 'footer.php'; ?>
