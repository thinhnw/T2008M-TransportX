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
    <div>
      <Navbar color="light" light expand="md" fixed="top" style={{ height: '80px' }}>
        <div className="container">
          <NavbarBrand href="/">
            <h2 className="text-danger font-weight-bold">TRANSPORT X
            </h2>
          </NavbarBrand>
          <NavbarToggler onClick={toggle} />
          <Collapse isOpen={isOpen} navbar>
            <Nav className="mr-auto" navbar className="w-100 d-flex justify-content-end">
              <NavItem>
                <NavLink href="/">Home</NavLink>
              </NavItem>
              <NavItem>
                <NavLink href="/about">About Us</NavLink>
              </NavItem>
              <NavItem>
                <NavLink href="/contact">Contact Us</NavLink>
              </NavItem>
              <NavItem>
                <NavLink>
                  <Link to="/post-office">Post Offices</Link>
                </NavLink>
              </NavItem>
              {/* <UncontrolledDropdown nav inNavbar>
                <DropdownToggle nav caret>
                  Dịch Vụ
                </DropdownToggle>
                <DropdownMenu right>
                  <DropdownItem>
                    Chuyển phát nhanh
                  </DropdownItem>
                  <DropdownItem>
                    Option 2
                  </DropdownItem>
                  <DropdownItem divider />
                  <DropdownItem>
                    Reset
                  </DropdownItem>
                </DropdownMenu>
              </UncontrolledDropdown> */}
            </Nav>
          </Collapse>
        </div>
      </Navbar>
    </div>
  );
}
