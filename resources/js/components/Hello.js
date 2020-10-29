import React from 'react'
import axios from 'axios'

class Hello extends React.Component {
	
	constructor(props){
		super(props)
		this.state = {
			items:[]
			
		}
		console.log('start');
	}
	
	
	fetchGetData(){
		console.log('2222222');
		//original = axios.get('/index.php/get_user_coin').then(response => {console.log(response)}).catch(error =>{console.log(error)})
		axios.get('/index.php/get_user_coin')
			.then(response => {
				console.log(response)
				this.setState({ items: response.data })
			})
			.catch(error =>
				{console.log(error)})
				
				/*fetch('/index.php/get_user_coin')
			.then(response => { 
				response.json()	
				})
			.then((data) => {
				this.setState({items: data})
				console.log(data)
				}
			)*/
			//.catch(errorMsg => {
			//	console.log(errorMsg)
			//	this.setState({errorMsg : 'Error retreiving data'})			
			//})
		//https://jsonplaceholder.typicode.com/posts
	}
	
	componentDidMount() {
		this.fetchGetData();
		this.interval = setInterval(() => this.fetchGetData(), 60*10*10);//10sec
	}
	
	render() {
		console.log(this.state)
		const {items} = this.state
		return (
			<div>
				<div key="">{items.sum_total}</div> 
			</div>
			
			
			
			
		);	
	}	
}

export default Hello;