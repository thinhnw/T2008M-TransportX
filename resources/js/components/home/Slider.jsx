import React, { useState } from 'react';
import {
  Carousel,
  CarouselItem,
  CarouselControl,
  CarouselIndicators,
  CarouselCaption
} from 'reactstrap';

const items = [
  {
    src: 'img/Delivery-Express.jpg',
    altText: 'Slide 1',
    header: 'Welcome to our company',
    caption: 'TRANSPORT X'
  },
  {
    src: 'img/Druga-Pozadina.jpg',
    altText: 'Slide 2',
    header: 'Parcel deliveries',
    caption: 'NATION WIDE NETWORK',
  },
 
];

export default function Slider(props) {
  const [activeIndex, setActiveIndex] = useState(0);
  const [animating, setAnimating] = useState(false);

  const next = () => {
    if (animating) return;
    const nextIndex = activeIndex === items.length - 1 ? 0 : activeIndex + 1;
    setActiveIndex(nextIndex);
  }

  const previous = () => {
    if (animating) return;
    const nextIndex = activeIndex === 0 ? items.length - 1 : activeIndex - 1;
    setActiveIndex(nextIndex);
  }

  const goToIndex = (newIndex) => {
    if (animating) return;
    setActiveIndex(newIndex);
  }

  const slides = items.map((item) => {
    return (
      <CarouselItem
        onExiting={() => setAnimating(true)}
        onExited={() => setAnimating(false)}
        key={item.src}
      >
        <div style={styles.imgWrapper}>
          <img src={item.src} alt={item.altText} style={styles.img} />
        </div>
        <CarouselCaption captionText={item.caption} captionHeader={item.header} />
        <div className="icons">
          <div className="truck-img-wrapper">
            <img src="img/truck-vignette-gray.png" className="truck-img" alt="" />
          </div>
          <div className="d-flex justify-content-between">
            <div className="icon-wrapper">
              <img src="img/phone.svg" alt="" />
            </div>
            <div className="icon-wrapper">
              <img src="img/umbrella.svg" alt="" />
            </div>
            <div className="icon-wrapper">
              <img src="img/list.svg" alt="" />
            </div>
          </div>
        </div>
      </CarouselItem>
    );
  });

  return (
    <Carousel
      activeIndex={activeIndex}
      next={next}
      previous={previous}
      style={{}}
      className="slider"
    >
      <CarouselIndicators items={items} activeIndex={activeIndex} onClickHandler={goToIndex} />
      {slides}
      <CarouselControl direction="prev" directionText="Previous" onClickHandler={previous} />
      <CarouselControl direction="next" directionText="Next" onClickHandler={next} />
    </Carousel>
  );
}

const styles = {
  img: {
    display: 'block',
    width: '100%',
    transform: 'translateY(-300px)'
  },
  imgWrapper: {
    display: 'block',
    width: '100%',
    height: '630px',
    overFlow: 'hidden'
  }
}