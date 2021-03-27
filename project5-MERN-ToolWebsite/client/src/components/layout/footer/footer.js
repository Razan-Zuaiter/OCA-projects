import React from 'react';
import ImgLogo from "../../assets/nav.png"
import './ffooter.css';
import Img2 from "./donut.svg"; 

function Footer() {
  return (

  <div className='m_footer_container b'>
    <div className="m_footer_section1 b">
      <p className="m_footer_name b">Find Your Favorite Sweets</p>
    </div>
    <div className="m_footer_section2 b">
      <p className="m_footer_name b ">What Are You Waiting For</p>
    </div>
    <div className="m_footer_section3 b">
      <div className="m_footer_section3_part1 b">
        <div className="m_footer_s3_p1_p1 b"></div>
        <div className="m_footer_s3_p1_p2 b">
          <img src={ImgLogo} alt="" className="m_footer_logo "/>
        </div>
        <div className="m_footer_s3_p1_p3 b">
        <a
              className="w-social-icon-link facebook"
              href="https://www.facebook.com/abd.alhajeid"
              target="_blank"
              aria-label="Facebook"
            >
              <i className="fab fa-facebook-f" />
            </a>
            <a
              className="w-social-icon-link instagram"
              href="https://www.instagram.com/hellgrav/"
              target="_blank"
              aria-label="Instagram"
            >
              <i className="fab fa-instagram" />
            </a>
            <a
              className="w-social-icon-link w-youtube"
              href="https://www.youtube.com/watch?v=Pz70gsQVr40&ab_channel=Insider"
              target="_blank"
              aria-label="Youtube"
            >
              <i className="fab fa-youtube" />
            </a>
            <a
              className="w-social-icon-link w-twitter"
              href="https://twitter.com/waedMD98?s=09"
              target="_blank"
              aria-label="Twitter"
            >
              <i className="fab fa-twitter" />
            </a>
            <a
              className="w-social-icon-link w-twitter"
              href="https://www.linkedin.com/in/abdallah-alhajeid/"
              target="_blank"
              aria-label="LinkedIn"
            >
              <i className="fab fa-linkedin" />
            </a>
            
        </div>
      </div>
      <div className="m_footer_section3_part2 b">
      <div className="m_footer_s3_p2_p1 b">
        <div className="m_footer_title_donut"><p>We Are so happy to see you  here</p></div>
        <div className="m_footer_donuts">
          <img className="animate__animated animate__bounce" src={Img2} alt=""/>
        </div>
      </div>
        <div className="m_footer_s3_p2_p2 b">
        <h3 className="m_t">About Us</h3>
            <a className="m_p" href="http://localhost:3000/about-us">What we do</a>
            <a className="m_p" href="http://localhost:3000/contact-us">Contact Us</a>
            <a className="m_p" href="http://localhost:3000/about-us">Our Team</a>
        </div>
        <div className="m_footer_s3_p2_p3  b">
        <h3 className="m_t"> Social Media</h3>
            <a className="m_p" href="#">Instagram</a>
            <a className="m_p" href="#">Facebook</a>
            <a className="m_p" href="#">Youtube</a>
            <a className="m_p" href="#">Twitter</a>
        </div>
       
      </div>
    </div>
    <div className="m_footer_copyWrite">
      <p>Sugar © 2020</p>
    </div>
​
  </div>)}
export default Footer;





