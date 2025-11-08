// src/pages/HomePage.jsx

import React from 'react';
import Slider from '../components/Slider';
import Services from '../components/Services';
import Comment from '../components/Comment';

function HomePage() {
  return (
    <>
      <Slider />
      <Services />
      <Comment />
    </>
  );
}

export default HomePage;