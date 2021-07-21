import React from 'react';
import ReactDOM from 'react-dom';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";

import Home from './home/Home.jsx';
import PostOffices from './search_post_office/SearchPostOffice.jsx'
import About from './about/About.jsx'
import Menu from './partials/Menu'
import Footer from './partials/Footer'
// import { divIcon } from 'leaflet';
function Example() {
	return (
			<Router>
				<Menu />
				<Switch>
					<Route path="/post-office">
						<PostOffices />
					</Route>
					<Route path="/about">
						<About />
					</Route>
					<Route path="/">
						<Home />
					</Route>
				</Switch>
				<Footer />
			</Router>
		
	);
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
