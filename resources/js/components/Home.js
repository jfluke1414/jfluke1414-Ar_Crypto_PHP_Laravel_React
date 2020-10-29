import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios'
import Hello from '../components/Hello'
//import Header from '../components/Header'
                   
function Home() {
	return (
        <div className="container">
				<Hello />
                
        </div>
    );	
}

export default Home;

if (document.getElementById('total_estimated_value')) {
    ReactDOM.render(<Home />, document.getElementById('total_estimated_value')); 
}