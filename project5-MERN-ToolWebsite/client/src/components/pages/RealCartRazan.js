import React, { Component } from 'react'
import {Link} from "react-router-dom"
import R_Card_Donut_Lubna  from "./cardDonutsRazan";
import R_Card_Ice_Lubna  from "./cardIceRazan";
import R_Card_Cake_Lubna  from "./cardcakeRazan";

class RealCart extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }
    render() {
        return (
         <div>
             <h1 className="l_h1"> Choose your favorite Sweet </h1>
        <R_Card_Cake_Lubna /> 
         <R_Card_Ice_Lubna />
         <R_Card_Donut_Lubna />
         </div>

        );
    }
}
export default RealCart;