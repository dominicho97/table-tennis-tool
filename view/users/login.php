<br>
<br>
<br>
<br>
<br>
<main class="playingfield">
  <div class="reglog-container">
    <div class="reglog-flex">
      <div class="reglog-col">
        <h2>REGISTRATION</h2>
        <form class="register-form" method="post" id="registerF">
          <label for="username">Choose a username: </label>
          <input type="text" name="usernameR" placeholder="user3342"><br>
          <label for="email">Enter your email: </label>
          <input type="email" name="emailR" placeholder="user3342@example.com"><br>
          <label for="password">Choose a password: </label>
          <input type="password" name="passwordR" placeholder="Password"><br>
          <label for="password">Repeet your password: </label>
          <input type="password" name="passwordR2" placeholder="Password"><br>
          <label for="skill">I am a </label>
          <select name="roomR" form="registerF">
          <?php foreach ($rooms as $room): ?>
            <option value="<?php echo $room["id"] ?>"><?php echo $room["name"] ?></option>
          <?php endforeach; ?>
          </select>
          <input type="submit" name="submitR" value="REGISTER">
        </form>
      </div>
      <div class="reglog-col">
        <h2>LOGIN</h2>
        <form class="login-form" method="post">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="Password"><br>
          <input type="submit" name="submitLI" value="LOGIN">
        </form>
      </div>
    </div>
    </form>
  </div>
</main>
