import React, { Component } from "react";
import axios from "axios";
import { Table } from "react-bootstrap";

const Todos = (props) => (

  
  <tr  style={ {fontSize:"1.5rem" ,alignContent:"center" , verticalAlign:" middle"}}>
   
    <td>  <img src ={props.order.imgsrc}  style={ {width:"12rem" , height:"9rem", verticalAlign:" middle"}}/> </td>
    <td style={ {verticalAlign:" middle"}}>{props.order.ordername}</td>
    <td style={ {verticalAlign:" middle"}}>{props.order.quantity} </td>
    <td style={ {verticalAlign:" middle"}}>{props.order.price} </td>
  </tr>
);


export default class todo extends Component {
  constructor(props) {
    super(props);
    this.state = {
      username: "",
      orders: [],
    };
  }
  async componentDidMount() {
   
    function GetUser (){
      
      const UserName = JSON.parse(sessionStorage.getItem("myUser"))
      console.log(UserName);

      return UserName ;
      // this.setState({ username : UserName})
    }

    var username = "abdallah"  ;
    console.log(username);
    await axios
      .get("http://localhost:5000/api/orders/" + username)
      .then((res) => {
        this.setState({
          orders: res.data,
        });
      })
      .catch((err) => {
        console.log(err);
      });
  }


  todoList() {
    // console.log(this.state.todos);
    if (this.state.orders) {
      return this.state.orders.map((i) => {
        return <Todos order={i} key={i._id} />;
      });
    }
  }
  render() {
    return (
      <Table striped bordered hover size="sm" >
      <div
        className="container"
        style={{ fontFamily: 'Redressed',fontSize:"1.3rem" , textAlign:"center" , background:"#e6f0ed"}}>
        <div className="row">
          
          <table className="table table-stripped">
            <thead>
              <tr>
                <th>Order</th>
                <th> title</th>
                <th>quantity</th>
                <th>price</th>
              </tr>
            </thead>
            <tbody>{this.todoList()}</tbody>
          </table>
        </div>
      </div>
      </Table>
    );
   
  }
  
}