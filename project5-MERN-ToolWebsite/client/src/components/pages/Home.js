import React, { Component } from 'react';
import About from '../LandingPage/about';
import ControlledTabs from '../LandingPage/menu';
import YoutubeAPI from '../LandingPage/youtube';
import BackgroundImg from '../LandingPage/background';

import RealCart from './RealCartRazan';

export default function Home(){
  
    return (
     <div>
       <BackgroundImg/> 
        <About/>
        <ControlledTabs/>
        <YoutubeAPI/>
       {/* <RealCart/> */}
     </div>
  
    );
}