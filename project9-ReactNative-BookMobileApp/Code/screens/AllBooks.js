import React from "react";
import {SafeAreaView,View,Text,TouchableOpacity,Image, ScrollView,FlatList,} from "react-native";
import myBooksData from "../data/books";
import { COLORS, FONTS, SIZES, icons, images } from "../constants";

const AllBooks = ({ navigation }) => {
  const [myBooks, setMyBooks] = React.useState(myBooksData);
  function renderMyBookSection(myBooks) {
    const renderItem = ({ item, index }) => {
      return (
        <TouchableOpacity
          style={{
            flex: 1,
            marginTop: SIZES.padding,
            //marginRight: SIZES.padding,
            //On Razan Phone =20
            //On Saja's Phone =26
            marginLeft: 22,
          }}
          onPress={() => navigation.navigate("BookDetail", { book: item })}
        >
          {/* Book Cover */}
          <Image
            source={item.bookCover}
            resizeMode="cover"
            style={{
              width: 150,
              height: 250,
              borderRadius: 20,
            }}
          />
          {/* Book Info */}
          <View
            style={{
              marginTop: SIZES.radius,
              flexDirection: "row",
              alignItems: "center",
              justifyContent: "center",
            }}
          >
            <Text
              style={{
                ...FONTS.body4,
                color: COLORS.lightGray,
                marginRight: 20,
              }}
            >
              {item.bookName}
            </Text>
          </View>
        </TouchableOpacity>
      );
    };
    return (
      <View style={{ flex: 4 }}>
        {/* Books */}
        <View style={{ marginTop: SIZES.padding2 }}>
          <TouchableOpacity
            style={{ marginLeft: SIZES.padding, flex: 1, flexDirection: "row" }}
            onPress={() => navigation.goBack()}
          >
            <Image
              source={icons.back_arrow_icon}
              style={{
                width: 25,
                height: 25,
                marginTop: SIZES.base,
                tintColor: "white",
              }}
            />
            <Text
              style={{
                ...FONTS.h3,
                color: "white",
                marginTop: SIZES.base,
                alignItems: "center",
                justifyContent: "center",
                marginLeft: 100,
              }}
            >
              All Books
            </Text>
          </TouchableOpacity>
          <View style={{ width: 1000, paddingTop: SIZES.radius }}>
            <View style={{ flex: 1, borderTopColor: COLORS.lightGray, borderTopWidth: 1 }}></View>
          </View>
          <FlatList
            data={myBooks}
            renderItem={renderItem}
            keyExtractor={(item) => `${item.id}`}
            vertical
            showsHorizontalScrollIndicator={false}
            numColumns={2}
          />
        </View>
      </View>
    );
  }

  return (
    <SafeAreaView style={{ flex: 1, backgroundColor: COLORS.black }}>
      {/* Body Section */}
      <ScrollView style={{ marginTop: SIZES.radius, marginBottom: 15 }}>
        {/* Books Section */}
        <View>{renderMyBookSection(myBooks)}</View>
      </ScrollView>
    </SafeAreaView>
  );
};
export default AllBooks;
