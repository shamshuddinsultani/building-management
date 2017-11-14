<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                  <div col-md-12 col-sm-12 col-xs-12>
                    <fieldset>
                      <legend>Register</legend>
                      <form action="admin.php" method="post">
                        <label for="name">USERNAME:</label>
                        <input type="text" name="name"><br>
                        <label for="email">EMAIL:</label>
                        <input type="email" name="email"><br>
                        <label for="email">PASSWORD:</label>
                        <input type="password" name="password"><br>
                        <button type="submit" name="submit" class="btn btn-primary">Signup</button>
                      </form>
                    </fieldset>
                  </div>
                </div>
              </div>
<?php include 'footer.php'; ?>
