import React from "react";
import { createDrawerNavigator } from "@react-navigation/drawer";
import { icons, COLORS } from "../constants";
import {
  CategoryStackNavigator,
  MainStackNavigator,
  AllBooksStackNavigator,
  DonateStackNavigator,
} from "./stackNavigation";

const Drawer = createDrawerNavigator();

const DrawerNavigator = () => {
  return (
    <Drawer.Navigator
      drawerStyle={{
        backgroundColor: COLORS.black,
        width: 240,
        tintColor: "#ffff",
      }}
      drawerPosition="right"
      drawerContentOptions={{
        inactiveTintColor: "#fff",
        itemStyle: { marginVertical: 10 },
      }}
    >
      <Drawer.Screen name="Home" component={MainStackNavigator} />
      <Drawer.Screen name="All Books" component={AllBooksStackNavigator} />
      <Drawer.Screen name="Donate" component={DonateStackNavigator} />
      <Drawer.Screen name="Book Categories" component={CategoryStackNavigator} />
      <Drawer.Screen
        name="Adventure"
        component={(props) => <CategoryStackNavigator {...props} tap={1} />}
      />
      <Drawer.Screen
        name="Romance"
        component={(props) => <CategoryStackNavigator {...props} tap={2} />}
      />
      <Drawer.Screen
        name="Drama"
        component={(props) => <CategoryStackNavigator {...props} tap={3} />}
      />
    </Drawer.Navigator>
  );
};

export default DrawerNavigator;
