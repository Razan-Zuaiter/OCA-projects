import React, { Component } from 'react'
import R_Card_Lubna  from "./cardUi_donutsRazan"
import donutItem from "./donutDataRazan"
import "./styleCardRazan.css";

const CardItem =donutItem.map((item) =>  
    <R_Card_Lubna
         ordername={item.ordername}
         description={item.description}
         price={item.price}
         imgsrc={item.imgsrc}
    />
);

class R_Card_Donut_Lubna extends Component {

    render() {
        return (
            <div className="l_cards_container">
               {CardItem}
        </div>
        );
    }
}
export default R_Card_Donut_Lubna;