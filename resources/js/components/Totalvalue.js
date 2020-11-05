import React from 'react';
import ReactDOM from 'react-dom';

class Totalvalue extends React.Component {
	
	constructor(props){
		super(props)
		this.state = {
			items:[]
			
		}
	}
	
	fetchGetData(){
		axios.get('/index.php/get_user_coin')
			.then(response => {
				//console.log(response)
				this.setState({ items: response.data })
			})
			.catch(error =>	{
				console.log(error)})
	}
	
	componentDidMount() {		
		this.fetchGetData();
		this.interval = setInterval(() => this.fetchGetData(), 60*10*10);//10sec
	}
	
	render() {				
		const {items} = this.state
		return (
			<div>
				<div key="">{items.sum_total}</div> 
			</div>

		);	
	}	
}

export default Totalvalue;

if(document.getElementById('totalvalue')){
	ReactDOM.render(<Totalvalue/>, document.getElementById('totalvalue'));
}
