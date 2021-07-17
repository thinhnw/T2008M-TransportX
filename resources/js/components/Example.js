import React from 'react';
import ReactDOM from 'react-dom';
import Home from './home/Home.jsx';
function Example() {
	return (
		<Home />
	);
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
