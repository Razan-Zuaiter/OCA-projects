import React, { Component } from 'react'
import R_Card_Lubna  from "./cardUi_IceRazan"
import iceItem from "./iceDataRazan"
import donutItem from "./donutDataRazan"
import cakeItem from "./cakeDataRazan"
import { Card, CardDeck, Button, Form } from "react-bootstrap";
import "./styleCardRazan.css";

const CardItem =cakeItem.map((item) =>  
    <R_Card_Lubna
         ordername={item.ordername}
         description={item.description}
         price={item.price}
         imgsrc={item.imgsrc}
    />
);

class R_Card_Cake_Lubna extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }
    render() {
        return (
            <div className="l_cards_container">
               {CardItem}
        </div>
        );
    }
}
export default R_Card_Cake_Lubna;