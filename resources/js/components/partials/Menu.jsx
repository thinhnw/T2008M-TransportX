import ReactDOM from 'react-dom';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
import React, { useEffect, useState } from 'react';
import {
  Collapse,
  Navbar,
  NavbarToggler,
  NavbarBrand,
  Nav,
  NavItem,
  NavLink,
  UncontrolledDropdown,
  DropdownToggle,
  DropdownMenu,
  DropdownItem,
  NavbarText
} from 'reactstrap';

export default function Menu(props) {
  const [isOpen, setIsOpen] = useState(false);

  const toggle = () => setIsOpen(!isOpen);

  useEffect(() => {
    console.log('hello')
  }, [])
  return (
    <div className="menu">
      <Navbar color="light" light expand="md" fixed="top" style={{ height: '80px' }}>
        <div className="container">
          <NavbarBrand href="/">
            <h2 className="text-danger font-weight-bold">TRANSPORT X
            </h2>
          </NavbarBrand>
          <NavbarToggler onClick={toggle} />
          <Collapse isOpen={isOpen} navbar>
            <Nav className="mr-auto" navbar className="w-100 d-flex justify-content-end">
              <NavItem className="border-right px-2">
                <NavLink>
                  <Link to="/">Home</Link>
                </NavLink>
              </NavItem>
              <UncontrolledDropdown nav inNavbar className="px-2 border-right">
                <DropdownToggle nav caret>
                  Our Services
                </DropdownToggle>
                <DropdownMenu right>
                  <DropdownItem>
                    <Link to="/delivery">
                      Parcel Delivery
                    </Link>
                  </DropdownItem>
                  <DropdownItem>
                    <Link to="/track">
                      Track Your Delivery
                    </Link>
                  </DropdownItem>
                </DropdownMenu>
              </UncontrolledDropdown>
              <NavItem className="border-right px-2">
                <NavLink>
                  <Link to="/post-office">Post Offices</Link>
                </NavLink>
              </NavItem>
              <NavItem className="border-right px-2">
                <NavLink>
                  <Link to="/about">About Us</Link>
                </NavLink>
              </NavItem>
            </Nav>
          </Collapse>
        </div>
      </Navbar>
    </div>
  );
}
