import React from 'react';
import ReactDOM from 'react-dom';
import Menu from  '../partials/Menu.jsx'
import Slider from './Slider.jsx'
import Features from './Features.jsx';
import Calculator from './Calculator.jsx';
import Footer from '../partials/Footer.jsx'

export default function Home(props) {
  return (
    <div>
      <Menu /> 
      <Slider />
      <Features />
      <Calculator />
      <Footer />
    </div>
  );
}
