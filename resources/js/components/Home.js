import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios'
import Hello from '../components/Hello'
//import Header from '../components/Header'
                   
function Home() {
	return (
        <div className="container">
				<Hello />
                <div className="card-header">asdfsafExample Component dasfsadfdsafdsafsadfasdfasdfdsaf</div>
                <div className="card-body">I'm an example component!</div>
        </div>
    );	
}

export default Home;

if (document.getElementById('maincontent')) {
    ReactDOM.render(<Home />, document.getElementById('maincontent')); 
}