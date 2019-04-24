import React from "react";
import { Link } from "react-router-dom";
import "./Navbar.css";

const Navbar = () => {
  return (
    <div className="nav">
      <ul>
        <li>
          <a className="active" href="/">
            Home
          </a>
        </li>
        <li>
          <a href="./signin">Log In</a>
        </li>
        <li>
          <a href="./register">Register</a>
        </li>
        <li>
          <a href="#about">Schedule</a>
        </li>
      </ul>
      <Link to="/" />
    </div>
  );
};

export default Navbar;
