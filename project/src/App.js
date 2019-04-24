import React from "react";
import { BrowserRouter, Switch, Route } from "react-router-dom";
import Navbar from "./components/layout/Navbar";
import SignIn from "./components/auth/SignIn";
import Register from "./components/auth/Register";

function App() {
  return (
    <BrowserRouter>
      <div className="App" />
      <Navbar />
      <Switch>
        <Route path="/signin" component={SignIn} />
        <Route path="/register" component={Register} />
      </Switch>
    </BrowserRouter>
  );
}

export default App;
