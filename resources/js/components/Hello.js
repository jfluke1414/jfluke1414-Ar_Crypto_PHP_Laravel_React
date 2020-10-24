import React from 'react'
import axios from 'axios'

class Hello extends React.Component {
	
	constructor(props){
		super(props)
		this.state = {
			category_name:[]
		}
		console.log('a1a1a1');
	}
	
	componentDidMount() {
		
		console.log('2222222');
		axios.get('/index.php/test').then(response => {console.log(response)}).catch(error =>{console.log(error)})
		//fetch('https://jsonplaceholder.typicode.com/posts').then(res => console.log(res)).then((data) => {setState({category_name: data.message})})
		//https://jsonplaceholder.typicode.com/posts
	}
	
	render() {
		return (
			<div>
			<h1>hello world</h1>
			</div>
		);	
	}	
}

export default Hello;