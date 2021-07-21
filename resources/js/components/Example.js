import React from 'react';
import ReactDOM from 'react-dom';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";

import Home from './home/Home.jsx';
import PostOffices from './search_post_office/SearchPostOffice'
function Example() {
	return (
		<Router>
			<Switch>
				<Route path="/post-office">
					<PostOffices />
				</Route>
				<Route path="/">
					<Home />
				</Route>
			</Switch>
		</Router>
	);
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
