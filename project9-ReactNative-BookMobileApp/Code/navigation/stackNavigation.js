import React from "react";
import { createStackNavigator } from "@react-navigation/stack";
import Home from "../screens/Home";
import BookDetail from "../screens/BookDetail";
import Category from "../screens/Categories";
import AllBooks from "../screens/AllBooks";
import Donate from "../screens/Donate";
import Tabs from "./tabs";

const Stack = createStackNavigator();

const MainStackNavigator = () => {
  return (
    <Stack.Navigator
      screenOptions={{headerShown: false,}}
      initialRouteName={"Home"}
    >
      <Stack.Screen name="Tabs" component={Tabs} />
      <Stack.Screen name="BookDetail" component={BookDetail} />
      <Stack.Screen name="Categories" component={Category} />
    </Stack.Navigator>
  );
};

const CategoryStackNavigator = (props) => {
  return (
    <Stack.Navigator
      screenOptions={{headerShown: false,}}
      initialRouteName={"Categories"}
    >
      <Stack.Screen
        name="Categories"
        component={(prop) => <Category {...prop} tap={props.tap} />}
      />
    </Stack.Navigator>
  );
};
const AllBooksStackNavigator = () => {
  return (
    <Stack.Navigator
      screenOptions={{headerShown: false,headerTintColor: 'red',}}
      initialRouteName={"AllBooks"}
    >
      <Stack.Screen name="AllBooks" component={AllBooks} />
    </Stack.Navigator>
  );
};
const DonateStackNavigator = () => {
  return (
    <Stack.Navigator
      screenOptions={{headerShown: false,}}
      initialRouteName={"Donate"}
    >
      <Stack.Screen name="Donate" component={Donate} />
    </Stack.Navigator>
  );
};

export { MainStackNavigator, CategoryStackNavigator, AllBooksStackNavigator,DonateStackNavigator };
